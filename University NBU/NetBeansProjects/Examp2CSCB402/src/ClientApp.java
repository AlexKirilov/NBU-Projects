import java.awt.*;
import java.awt.event.*;
import java.io.BufferedReader;
import java.io.PrintWriter;
import java.net.Socket;
import java.net.*;
import java.io.*;

/** * * @author Axel */
public class ClientApp extends Frame {

    final int PORT_NUMBER = 3333;
    //Socet za komunikaciq
    public Socket sock;
   
    //Paneli
    private Panel leftPanel = new Panel();
    private Panel rightPanel = new Panel();
    
    //elementi na menuBar-a
    private MenuBar menubar = new MenuBar ();
    private Menu menuFile = new Menu ("File");
    private MenuItem menuExit = new MenuItem ("Exit");
    private Menu menuHelp = new Menu ("Help");
    private MenuItem menuAbout = new Menu ("About");

    //Elemnti na Main Panel-a
    private TextField textField1 = new TextField (20);
    private TextField textField2 = new TextField (20);
    private Button btnsend = new Button ("Sent");
    private Button btnconnect = new Button ("Connect");
    private Button btndisconnect = new Button ("Disconnect");
    private Label empty = new Label (""); 

        //Potoci
    //Vhoden i izhoden
    private BufferedReader in = null;
    private PrintWriter ou = null;

    public  ClientApp () {
        setTitle ("Aleksander_Kirilov");
        
        //Menu BAr
        setMenuBar(menubar);
        menubar.add(menuFile);
        menubar.add(menuHelp);
        //MenuItems
        menuFile.add(menuExit);
        menuHelp.add(menuAbout);
        
        //Panel - Left
        leftPanel.setLayout (new BorderLayout());
        leftPanel.add(textField1, BorderLayout.NORTH);
        leftPanel.add(textField2, BorderLayout.CENTER);
        textField1.setEnabled(false);
        
        //Panel - Right
        rightPanel.setLayout (new GridLayout (4,1));
        rightPanel.add(btnsend);
        rightPanel.add(empty);
        rightPanel.add(btnconnect);
        rightPanel.add(btndisconnect);
        
        btnconnect.setEnabled(true);
	btnsend.setEnabled(false);
	btndisconnect.setEnabled(false);
        
        add(rightPanel,BorderLayout.EAST);
	add(leftPanel,BorderLayout.CENTER);
        
        //Exit na programata
        addWindowListener (new WindowAdapter() {
            @Override
            public void windowClosing(WindowEvent e){
		System.exit(0);
	}});
        
        //Button "Connect"
	btnconnect.addActionListener (new ActionListener() {
            public void actionPerformed (ActionEvent e) {
		connect();
                textField1.setEnabled(true);               
			}
            private void connect() {
                try {
            sock = new Socket(InetAddress.getLocalHost(),PORT_NUMBER);
             // otwarqne na vhodniq potok
                in = new BufferedReader(new InputStreamReader(sock.getInputStream()));
                // Otvarqne na izhodniq potok
             ou = new PrintWriter(new OutputStreamWriter(sock.getOutputStream()));
             System.out.println("Connected!");
             //textField2.append(in.readLine() + "\n");
            // textField2.append(in.readLine() + "\n");			
         } catch (IOException ioe) {
            System.out.println(ioe.getMessage());
            ioe.printStackTrace();
        }
                textField1.setEnabled(true);
		btnconnect.setEnabled(false);
		btnsend.setEnabled(true);
		btndisconnect.setEnabled(true);
            }
	});
        //Button "Send"
	btnsend.addActionListener (new ActionListener () {
                @Override
		public void actionPerformed (ActionEvent e) {
			send(in, ou);
			}        
            private void send(BufferedReader in, PrintWriter ou) {
                String inLine;
	try {
		if (ou != null) {
			ou.println(textField1.getText()); 
			ou.flush();
			//textField2.appendText("Client: " + textField1.getText() + "\n");		
			inLine = in.readLine();
			//textField2.appendText("Server: " + inLine + "\n");
			if (textField1.getText().trim().toUpperCase().equals("Exit"))
				disconnect(in, ou);
			textField1.setText("");
			}		
		} catch (IOException ioe) {
			ioe.printStackTrace();
		}
            }

            private void disconnect(BufferedReader in, PrintWriter ou) {
                try {
			textField1.setEnabled(false);
			btnsend.setEnabled(false);
			btndisconnect.setEnabled(false);
			btnconnect.setEnabled(true);

			in.close();
			in = null;
			ou.close();
			ou = null;
		} catch (IOException ioe) {
			System.out.println (ioe.getMessage());
			ioe.printStackTrace();
		}
            }
        });
        //Button Disconnect
        btndisconnect.addActionListener (new ActionListener () {

            @Override
            public void actionPerformed(ActionEvent ae) {
               btnsend.setEnabled(false);
               btnconnect.setEnabled(true);
               btndisconnect.setEnabled(false);
            }
        });
        
	// Button Enter za tekstovoto pole
	textField1.addActionListener (new ActionListener () {
                @Override
		public void actionPerformed (ActionEvent e) {
			if (btnsend.isEnabled())
				send(in, ou);
			}

            private void send(BufferedReader in, PrintWriter ou) {
                 String inLine;
	try {
		if (ou != null) {
			ou.println(textField1.getText()); 
			ou.flush();
			//textField2.appendText("Client: " + textField1.getText() + "\n");		
			inLine = in.readLine();
			//textField2.appendText("Server: " + inLine + "\n");
			if (textField1.getText().trim().toUpperCase().equals("Exit"))
				disconnect(in, ou);
			textField1.setText("");
			}		
		} catch (IOException ioe) {
			ioe.printStackTrace();
		}
            }

            private void disconnect(BufferedReader in, PrintWriter ou) {
                 try {
			textField1.setEnabled(false);
			btnsend.setEnabled(false);
			btndisconnect.setEnabled(false);
			btnconnect.setEnabled(true);

			in.close();
			in = null;
			ou.close();
			ou = null;
		} catch (IOException ioe) {
			System.out.println (ioe.getMessage());
			ioe.printStackTrace();
		}
            }
	});
        //EXIT ot MenuBar-a
        menuExit.addActionListener( new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
		System.exit(0);
			}
		});               

	//setResizable(false);
        setSize(500,600);
        setVisible (true);
        pack();

    }

    public static void main(String[] args) {
    	ClientApp client = new ClientApp(); 
    }  
}
