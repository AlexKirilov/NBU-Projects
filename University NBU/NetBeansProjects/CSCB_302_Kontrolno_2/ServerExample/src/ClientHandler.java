import java.net.*;
import java.io.*;
import java.text.*;
import java.util.*;

// Нишка, обслужваща клиентската заявка

public class ClientHandler extends Thread  {
	protected SimpleDateFormat sdf;  // Съдържа текущата дата
	protected Socket socket;         // Socket - за комуникация с клиента
	protected Vector threadPull;     // За поддържане на пул от обслужваните нишки
	
	public ClientHandler(Socket incoming, Vector threadPull) {
		socket = incoming;
		this.threadPull = threadPull;
		sdf = new SimpleDateFormat("dd/MM/yyyy  hh:mm:ss");
		System.out.println ("New thread");
		// Включване на нишката в пула
		threadPull.add(this);		
	}
	
	public void run() {
		String outStr;            // Символен низ за изпращане към клиента
		boolean flagExit = false; // Управлява четенето от клиента
		
		System.out.println("Starting thread!");
		
		try {
			// Входен символен поток за сокета
			BufferedReader in
				= new BufferedReader(
					new InputStreamReader(
						socket.getInputStream()));
		    // Изходен символен поток за сокета
			PrintWriter out
				= new PrintWriter(
					new OutputStreamWriter(
						socket.getOutputStream()));
						
			out.println("Hello! ...");
			out.println("Enter BYE to exit.");
			out.flush();
			
			// Четене на ред от клиента и обработката му
			while (!flagExit) {
				// Чете ред
				String str = in.readLine();
				// Контролен изход в sysout
				System.out.println("From client:" + str);
				// Има ли съдържание в прочетения ред?
				if (str != null) {
					outStr = "Now is " + sdf.format(new Date());
					out.println("Echo: " + outStr);
					out.flush();
					// Обработката на заявката продължава до постъпване на низ "BYE"
					if ((str.trim()).toUpperCase().equals("BYE")) {
						flagExit = true;
					}
				}
			}
			socket.close();
		} catch (IOException e) { e.printStackTrace();}
		finally {
			// Изключване на нишката от пула на обслужвани нишки
			threadPull.remove(this);
		}
	}
}
