/**
 * @(#)ServerExample.java
 *
 * ServerExample application
 *
 * @author 
 * @version 1.00 2008/5/25
 */
 import java.net.*;
 import java.io.*;
 import java.util.*;
 /***************************************************************************/
 /* Примерна задача за контролна работа по CSCB 302 "Програмиране на Java " */
 /* Сървърна част                                                           */
 /***************************************************************************/
public class ServerTest {
	static final int SERVER_PORT = 3333;
	static ServerSocket serverSocket;
	// Пул на клиентските нишки
	static Vector<ClientHandler> threadPull = new Vector<ClientHandler>();

	// Главна нишка, в която се реализира основният цикъл на сървъра
    public static void main(String[] args) {	
    	try{
    		// Създаване на сървърен сокет - приложението "слуша" за постъпване на заявки по порт SERVER_PORT
			serverSocket = new ServerSocket(SERVER_PORT);
			System.out.println("Server is started!");
			// Използването на литерал true по този начин не е добър стил, 
			// но тук се допуска, заради простотата на решението    		
    		while (true) {
    			// Получаване на заявка - създаване на socket
    			Socket incoming = serverSocket.accept();    			
    			System.out.println("New client accepted!");
    			// Създавне и стартиране на нишка, обслужваща клиентската заявка
    			(new ClientHandler(incoming, threadPull)).start();
    		}  		
    	} catch (Exception e) {
    		e.getMessage();
    		e.printStackTrace();
    	}

    }
}
