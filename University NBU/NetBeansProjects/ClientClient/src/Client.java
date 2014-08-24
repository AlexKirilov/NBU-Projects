/**
 * @(#)ExampleClient.java
 *
 * ExampleClient application
 *
 * @author 
 * @version 1.00 2008/5/25
 */
 import java.awt.*;
 import java.awt.event.*;
 import java.net.*;
 import java.io.*;
 
/**********************************************************************************/
/* Примерна задача за контролна работа по CSCB 302 "Програмиране на Java"         */
/* Клиентска част                                                                 */
/**********************************************************************************/ 
 
public class Client extends Frame {
	// Порт за комуникация със сървъра
	final int PORT_NUMBER = 3333;
	
	// Елементи на графичния потребителски интерфейс
	private MenuBar menuBar = new MenuBar();
	private Menu menuFile = new Menu("File");
	private Menu menuHelp = new Menu("Help");
	private MenuItem menuExit = new MenuItem("Exit");
	private MenuItem menuAbout = new MenuItem("About");
	
	private TextField textSend = new TextField(20);
	private TextArea textArea = new TextArea(5,20);
	
	private Button buttonConnect = new Button("Connect");
	private Button buttonSend = new Button("Send");
	private Button buttonDisconnect = new Button("Disconnect");
	private Button buttonQuit = new Button("Quit");
	
	private Label empty = new Label("");
	private Panel leftPanel = new Panel();
	private Panel rightPanel = new Panel();

	// Входен поток
	private BufferedReader in = null;
	// Изходен поток
	private PrintWriter ou = null;;
	
    // Сокет за комуникация	
    private Socket sock;
	
	public Client () {
		setTitle("Example Client");
		
		setMenuBar(menuBar);
		menuBar.add(menuFile);
		menuBar.add(menuHelp);
		
		menuFile.add(menuExit);
		menuHelp.add(menuAbout);
		
		leftPanel.setLayout(new BorderLayout());
		rightPanel.setLayout(new GridLayout(6,1));
		
		leftPanel.add(textSend,BorderLayout.NORTH);
		leftPanel.add(textArea,BorderLayout.CENTER);
		
		rightPanel.add(buttonConnect);
		rightPanel.add(buttonSend);
		rightPanel.add(buttonDisconnect);
		rightPanel.add(empty);
		rightPanel.add(empty);
		rightPanel.add(buttonQuit);
		
		add(rightPanel,BorderLayout.EAST);
		add(leftPanel,BorderLayout.CENTER);
		
		textSend.setEnabled(false);
		
		// Обработка на WindowEvent - затваряне на прозореца	
		addWindowListener (new WindowAdapter() {
			public void windowClosing(WindowEvent e){
				quit();
			}
		});
		// Задействане на бутон "Connect"
		buttonConnect.addActionListener (new ActionListener() {
			public void actionPerformed (ActionEvent e) {
				connect();
			}
		});
		// Задействане на бутон "Send"
		buttonSend.addActionListener (new ActionListener () {
			public void actionPerformed (ActionEvent e) {
				send(in, ou);
			}
		});
		// Задействане на <Enter> за текстово поле textSend (само ако е разрешено изпращането)
		textSend.addActionListener (new ActionListener () {
			public void actionPerformed (ActionEvent e) {
				if (buttonSend.isEnabled())
					send(in, ou);
			}
		});
		
		// Задействане на бутон Quit
		buttonQuit.addActionListener (new ActionListener () {
			public void actionPerformed(ActionEvent e) {
				quit();
			}
		});
		// Задействане на бутон "Disconnect"
		buttonDisconnect.addActionListener(new ActionListener(){
			public void actionPerformed(ActionEvent e) {
				ou.println("BYE");
				ou.flush();
				disconnect(in, ou);
			}
		});
		
		// Задействане на MenuItem "Exit"
		menuExit.addActionListener( new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				quit();
			}
		});
		
		buttonConnect.setEnabled(true);
		buttonSend.setEnabled(false);
		buttonDisconnect.setEnabled(false);
		
		setVisible(true);
		pack();
		setResizable(false);
		
	}
	// Функция "Connect" - свързване със сървъра
	private void connect() {
		try {
			// Създаване на сокет за комуникация със сървъра
			sock = new Socket(InetAddress.getLocalHost(),PORT_NUMBER);
			// Отваряне на входния поток
			in = new BufferedReader(new InputStreamReader(sock.getInputStream()));
			// Отваряне на изходния поток
			ou = new PrintWriter(new OutputStreamWriter(sock.getOutputStream()));
			System.out.println("Connected!");
			textArea.append(in.readLine() + "\n");
			textArea.append(in.readLine() + "\n");			
		} catch (IOException ioe) {
			System.out.println(ioe.getMessage());
			ioe.printStackTrace();
		}
		// Разрешаваме текстовото поле textSend, бутона за дисконектване
		// buttonDisconnect и бутона за изпращане buttonSend
		// Забраняваме бутона за свързване buttonConnect
		textSend.setEnabled(true);
		buttonConnect.setEnabled(false);
		buttonSend.setEnabled(true);
		buttonDisconnect.setEnabled(true);
	}
	
	// Функция "Send" - изпращане на съобщение към сървъра 
	private void send (BufferedReader in, PrintWriter out) {
		String inLine;
		try {
			// Ако сме свързани със сървъра
			if (ou != null) {
				ou.println(textSend.getText()); 
				ou.flush();
				textArea.appendText("Client: " + textSend.getText() + "\n");		
				inLine = in.readLine();
				textArea.appendText("Server: " + inLine + "\n");
				if (textSend.getText().trim().toUpperCase().equals("BYE"))
					disconnect(in, ou);
				textSend.setText("");
			}		
		} catch (IOException ioe) {
			ioe.printStackTrace();
		}
	}
	// Излизане от приложението
	private void quit() {
		System.exit(0);
	}
	
	// Прекратяване на връзката със сървъра
	private void disconnect(BufferedReader in, PrintWriter out) {

		try {
			// Забраняваме текстовото поле textField, бутона за 
			// изпращане buttonSend, бутона за дисконектване buttonDisconnect
			//Разрешаваме бутона за свързване buttonConnect
			textSend.setEnabled(false);
			buttonSend.setEnabled(false);
			buttonDisconnect.setEnabled(false);
			buttonConnect.setEnabled(true);
			// Затваряме входния и изходния поток
			in.close();
			in = null;
			ou.close();
			ou = null;
		} catch (IOException ioe) {
			System.out.println (ioe.getMessage());
			ioe.printStackTrace();
		}

	}
    
    public static void main(String[] args) {
    	Client clientFrame = new Client(); 
    }  
}
