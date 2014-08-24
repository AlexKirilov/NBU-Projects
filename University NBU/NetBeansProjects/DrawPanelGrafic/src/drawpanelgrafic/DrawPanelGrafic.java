package drawpanelgrafic;

import java.awt.*;
import javax.swing.*;

/**  * * @author Axel  */
public class DrawPanelGrafic {

    /**  * @param args the command line arguments  */
    
    //Graphic class Panel;
  public static class MyCanvas extends JComponent {  
     @Override
     public void paintComponent (Graphics g) {
         
       //Main Rectangle with blue color;
       g.setColor (Color.BLUE);
       g.fillRect (10,10, 400, 400);
       
       //Second Rectangle - White color;
       g.setColor (Color.WHITE);
       g.fillRoundRect(30, 30, 360, 360, 40, 50);
       
       //Third Rectangle - Red color; 
       g.setColor(Color.RED);
       g.fillRect (71, 71, 145, 145);
       
       //First circle Blue
       g.setColor (Color.BLUE);
       g.fillArc(70, 70, 290, 290, 90, -270);
       
       //Second circle White
       g.setColor (Color.WHITE);
       g.fillArc (70, 70, 289, 289, 90, 90);          
   }    
  }
    
    public static void main(String[] args) {
        // TODO code application logic here
        //Създаваме нов прозорец и го визиолизира ме!!!
        JFrame mainFrame = new JFrame ("Graphics");
        mainFrame.getContentPane ().add (new MyCanvas ());
        mainFrame.setPreferredSize (new Dimension (450, 470));
        mainFrame.pack();
        mainFrame.setVisible(true);  
    }
}