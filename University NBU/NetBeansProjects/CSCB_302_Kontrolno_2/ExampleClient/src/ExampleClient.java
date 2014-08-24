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
/* �������� ������ �� ��������� ������ �� CSCB 302 "������������ �� Java"         */
/* ��������� ����                                                                 */
/**********************************************************************************/ 
 
public class ExampleClient extends Frame {
	// ���� �� ����������� ��� �������
	final int PORT_NUMBER = 3333;
	
	// �������� �� ��������� ������������� ���������
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

	// ������ �����
	private BufferedReader in = null;
	// ������� �����
	private PrintWriter ou = null;;
	
    // ����� �� �����������	
    private Socket sock;
	
	public ExampleClient () {
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
		
		// ��������� �� WindowEvent - ��������� �� ���������	
		addWindowListener (new WindowAdapter() {
			public void windowClosing(WindowEvent e){
				quit();
			}
		});
		// ����������� �� ����� "Connect"
		buttonConnect.addActionListener (new ActionListener() {
			public void actionPerformed (ActionEvent e) {
				connect();
			}
		});
		// ����������� �� ����� "Send"
		buttonSend.addActionListener (new ActionListener () {
			public void actionPerformed (ActionEvent e) {
				send(in, ou);
			}
		});
		// ����������� �� <Enter> �� �������� ���� textSend (���� ��� � ��������� �����������)
		textSend.addActionListener (new ActionListener () {
			public void actionPerformed (ActionEvent e) {
				if (buttonSend.isEnabled())
					send(in, ou);
			}
		});
		
		// ����������� �� ����� Quit
		buttonQuit.addActionListener (new ActionListener () {
			public void actionPerformed(ActionEvent e) {
				quit();
			}
		});
		// ����������� �� ����� "Disconnect"
		buttonDisconnect.addActionListener(new ActionListener(){
			public void actionPerformed(ActionEvent e) {
				ou.println("BYE");
				ou.flush();
				disconnect(in, ou);
			}
		});
		
		// ����������� �� MenuItem "Exit"
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
	// ������� "Connect" - ��������� ��� �������
	private void connect() {
		try {
			// ��������� �� ����� �� ����������� ��� �������
			sock = new Socket(InetAddress.getLocalHost(),PORT_NUMBER);
			// �������� �� ������� �����
			in = new BufferedReader(new InputStreamReader(sock.getInputStream()));
			// �������� �� �������� �����
			ou = new PrintWriter(new OutputStreamWriter(sock.getOutputStream()));
			System.out.println("Connected!");
			textArea.append(in.readLine() + "\n");
			textArea.append(in.readLine() + "\n");			
		} catch (IOException ioe) {
			System.out.println(ioe.getMessage());
			ioe.printStackTrace();
		}
		// ����������� ���������� ���� textSend, ������ �� �������������
		// buttonDisconnect � ������ �� ��������� buttonSend
		// ����������� ������ �� ��������� buttonConnect
		textSend.setEnabled(true);
		buttonConnect.setEnabled(false);
		buttonSend.setEnabled(true);
		buttonDisconnect.setEnabled(true);
	}
	
	// ������� "Send" - ��������� �� ��������� ��� ������� 
	private void send (BufferedReader in, PrintWriter out) {
		String inLine;
		try {
			// ��� ��� �������� ��� �������
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
	// �������� �� ������������
	private void quit() {
		System.exit(0);
	}
	
	// ������������ �� �������� ��� �������
	private void disconnect(BufferedReader in, PrintWriter out) {

		try {
			// ����������� ���������� ���� textField, ������ �� 
			// ��������� buttonSend, ������ �� ������������� buttonDisconnect
			//����������� ������ �� ��������� buttonConnect
			textSend.setEnabled(false);
			buttonSend.setEnabled(false);
			buttonDisconnect.setEnabled(false);
			buttonConnect.setEnabled(true);
			// ��������� ������� � �������� �����
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
    	ExampleClient clientFrame = new ExampleClient(); 
    }  
}
