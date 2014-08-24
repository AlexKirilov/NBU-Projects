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
 /* �������� ������ �� ��������� ������ �� CSCB 302 "������������ �� Java " */
 /* �������� ����                                                           */
 /***************************************************************************/
public class ServerExample {
	static final int SERVER_PORT = 3333;
	static ServerSocket serverSocket;
	// ��� �� ����������� �����
	static Vector<ClientHandler> threadPull = new Vector<ClientHandler>();

	// ������ �����, � ����� �� ��������� ��������� ����� �� �������
    public static void main(String[] args) {	
    	try{
    		// ��������� �� �������� ����� - ������������ "�����" �� ���������� �� ������ �� ���� SERVER_PORT
			serverSocket = new ServerSocket(SERVER_PORT);
			System.out.println("Server is started!");
			// ������������ �� ������� true �� ���� ����� �� � ����� ����, 
			// �� ��� �� �������, ������ ���������� �� ���������    		
    		while (true) {
    			// ���������� �� ������ - ��������� �� socket
    			Socket incoming = serverSocket.accept();    			
    			System.out.println("New client accepted!");
    			// �������� � ���������� �� �����, ���������� ����������� ������
    			(new ClientHandler(incoming, threadPull)).start();
    		}  		
    	} catch (Exception e) {
    		e.getMessage();
    		e.printStackTrace();
    	}

    }
}
