
import java.net.ServerSocket;
import java.net.Socket;
import java.util.Vector;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Axel
 */
public class ServerCSCB402 {
    static final int SERVER_PORT = 3333;
	static ServerSocket serverSocket;

	static Vector<ClientHandler> threadPull = new Vector<ClientHandler>();


    public static void main(String[] args) {	
    	try{

			serverSocket = new ServerSocket(SERVER_PORT);
			System.out.println("Server is started!");
    		
    		while (true) {

    			Socket incoming = serverSocket.accept();    			
    			System.out.println("New client accepted!");
    			(new ClientHandler(incoming, threadPull)).start();
    		}  		
    	} catch (Exception e) {
    		e.getMessage();
    		e.printStackTrace();
    	}
}
}
