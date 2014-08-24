import java.net.*;
import java.io.*;
import java.text.*;
import java.util.*;

// �����, ���������� ����������� ������

public class ClientHandler extends Thread  {
	protected SimpleDateFormat sdf;  // ������� �������� ����
	protected Socket socket;         // Socket - �� ����������� � �������
	protected Vector threadPull;     // �� ���������� �� ��� �� ������������ �����
	
	public ClientHandler(Socket incoming, Vector threadPull) {
		socket = incoming;
		this.threadPull = threadPull;
		sdf = new SimpleDateFormat("dd/MM/yyyy  hh:mm:ss");
		System.out.println ("New thread");
		// ��������� �� ������� � ����
		threadPull.add(this);		
	}
	
	public void run() {
		String outStr;            // �������� ��� �� ��������� ��� �������
		boolean flagExit = false; // ��������� �������� �� �������
		
		System.out.println("Starting thread!");
		
		try {
			// ������ �������� ����� �� ������
			BufferedReader in
				= new BufferedReader(
					new InputStreamReader(
						socket.getInputStream()));
		    // ������� �������� ����� �� ������
			PrintWriter out
				= new PrintWriter(
					new OutputStreamWriter(
						socket.getOutputStream()));
						
			out.println("Hello! ...");
			out.println("Enter BYE to exit.");
			out.flush();
			
			// ������ �� ��� �� ������� � ����������� ��
			while (!flagExit) {
				// ���� ���
				String str = in.readLine();
				// ��������� ����� � sysout
				System.out.println("From client:" + str);
				// ��� �� ���������� � ���������� ���?
				if (str != null) {
					outStr = "Now is " + sdf.format(new Date());
					out.println("Echo: " + outStr);
					out.flush();
					// ����������� �� �������� ���������� �� ���������� �� ��� "BYE"
					if ((str.trim()).toUpperCase().equals("BYE")) {
						flagExit = true;
					}
				}
			}
			socket.close();
		} catch (IOException e) { e.printStackTrace();}
		finally {
			// ���������� �� ������� �� ���� �� ���������� �����
			threadPull.remove(this);
		}
	}
}
