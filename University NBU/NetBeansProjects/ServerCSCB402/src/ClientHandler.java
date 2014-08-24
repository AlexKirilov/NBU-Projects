
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.io.PrintWriter;
import java.net.Socket;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Vector;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Axel
 */
public class ClientHandler extends Thread  {
	protected SimpleDateFormat sdf;  // Съдържа текущата дата
	protected Socket socket;         // Socket - за комуникация с клиента
	protected Vector threadPull;     // За поддържане на пул от обслужваните нишки
	
	public ClientHandler(Socket incoming, Vector threadPull) {
		socket = incoming;
		this.threadPull = threadPull;
		sdf = new SimpleDateFormat("dd/MM/yyyy  hh:mm:ss");
		System.out.println ("New thread");

		threadPull.add(this);		
	}
	
        @Override
	public void run() {
		String outStr;            
		boolean flagExit = false; 
		
		System.out.println("Starting thread!");
		
		try {

			BufferedReader in
				= new BufferedReader(
					new InputStreamReader(
						socket.getInputStream()));
			PrintWriter out
				= new PrintWriter(
					new OutputStreamWriter(
						socket.getOutputStream()));
						
			out.println("Hello! ...");
			out.println("Enter Exit to exit.");
			out.flush();
			
			while (!flagExit) {
				String str = in.readLine();
				System.out.println("From client:" + str);
				if (str != null) {
					outStr = "Now is " + sdf.format(new Date());
					out.println("Echo: " + outStr);
					out.flush();
					if ((str.trim()).toUpperCase().equals("Exit")) {
						flagExit = true;
					}
				}
			}
			socket.close();
		} catch (IOException e) { e.printStackTrace();}
		finally {
			threadPull.remove(this);
		}
	}
}
