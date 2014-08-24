import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.WindowAdapter;
import java.awt.event.WindowEvent;
import java.util.logging.Level;
import java.util.logging.Logger;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * @author Axel
 */
public class HomeWorkThreads2 extends Frame {
   
    private final Panel leftPanel   = new Panel();
    private final Panel midPanel    = new Panel();
    private final Panel rightPanel  = new Panel();
    private final Panel footerPanel = new Panel();
    private final TextField txtSource = new TextField (5);
    private final TextField txtBuffer = new TextField (5);
    private final TextField txtDest   = new TextField (5);
    private final Button btnStart = new Button ("Start");
    private final Button btnStop  = new Button ("Stop");
       private final Label nishka  = new Label ("Нишка");
       private final Label danni   = new Label ("Данни");
       private final Label reader  = new Label ("Читател");
       private final Label writer  = new Label ("Писател");
       private final Label lBuffer = new Label ("Buffer");
       private final Label empty   = new Label ("");
    public boolean bla;
    public HomeWorkThreads2 () {
        
        Label nishka2  = new Label ("Нишка");
        Label danni2   = new Label ("Данни");
        Label empty1   = new Label ("");
        Label empty2   = new Label ("");
        
        //Left Panel - attributes
        leftPanel.setLayout (new GridLayout (4,1));
        leftPanel.setBackground (Color.BLUE);
        leftPanel.add(nishka);
        leftPanel.add(writer);
        leftPanel.add(txtSource);
        leftPanel.add(danni);
        
        //Middle Panel - attributes
        midPanel.setLayout (new GridLayout (4,1));
        midPanel.add(empty1);
        midPanel.add(empty2);
        midPanel.add(txtBuffer);
        midPanel.add(lBuffer);
        
        //Right Panel - attributes
        rightPanel.setLayout (new GridLayout (4,1));
        rightPanel.setBackground (Color.YELLOW);
        rightPanel.add(nishka2);
        rightPanel.add(reader);
        rightPanel.add(txtDest);
        rightPanel.add(danni2);
        
        //Footer Panel - attributes
        footerPanel.setLayout (new FlowLayout());
        footerPanel.add(empty);
        footerPanel.add(btnStart);
        footerPanel.add(btnStop);
        footerPanel.add(empty);      
        
        //Adding the Panels on Frame
        add(leftPanel, BorderLayout.WEST);
        add(midPanel, BorderLayout.CENTER);
        add(rightPanel, BorderLayout.EAST);
        add(footerPanel, BorderLayout.SOUTH);
        
        //Setting UnEnable button stop and wait to be activate from start Button
        btnStop.setEnabled(false);
 
        pack();
        setTitle("F65063");
        setSize(250,200);
        setLocationRelativeTo(null); 
        setResizable(false);
        setVisible(true);
        txtBuffer.setFocusable(false);
        
        //Exit na programata
        addWindowListener (new WindowAdapter() {
            @Override
            public void windowClosing(WindowEvent e){
		System.exit(0);
	}});
                    
        btnStart.addActionListener (new banani () {
            });
                
        btnStop.addActionListener (new banani(){});
        
    }
    public static void main(String[] args) {
        HomeWorkThreads2 homework = new HomeWorkThreads2();
        //ThreadCreate Producer = new ThreadCreate ("Producer", 1000);
        //ThreadCreate Consumer = new ThreadCreate ("Consumer", 1500);
        
        // TODO code application logic here
    }
       public class banani implements ActionListener{
    public void actionPerformed (ActionEvent a){
        Button b =(Button) a.getSource();
        Quantity2 prod = new Quantity2();
        Quantity2 cons = new Quantity2();
        if(txtBuffer.getText().length() == 0 && txtSource.getText().length() == 0 && txtDest.getText().length() == 0){
        prod.buk(0);
        cons.buk(0);
        }else if(txtBuffer.getText().length() == 0 && txtSource.getText().length() != 0 && txtDest.getText().length() == 0){
        prod.buk(Integer.parseInt(txtSource.getText()));
        txtBuffer.setText(txtSource.getText());
        txtDest.setText(txtSource.getText());
        cons.buk(Integer.parseInt(txtSource.getText()));
        }
        if(b.equals(btnStart) ){
            System.out.println("btnstart");
               btnStop.setEnabled(true);
            bla = true;
            prod.start();
            cons.start();
            
     System.out.println("end of start");
        }
        
        if(b.equals(btnStop)){
            System.out.println("Stop clicked");
            prod.stoprequestbanani();
            cons.stoprequestbanani();
            prod.interrupt();
            cons.interrupt();
        }
    }
}
}