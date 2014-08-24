/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package pointedtouchpanel;

import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.awt.event.WindowAdapter;
import java.awt.event.WindowEvent;

/**
 *
 * @author Aleksander Kirilov f65063
 */
public class PointedTouchPanel {

    /**
     * @param args the command line arguments
     */
    public static class PanelButtons extends Frame {
        private Button btnRed = new Button ("Red");
        private Button btnBlue = new Button ("Blue");
        private Button btnGreen = new Button ("Green");
        private Button btnClear = new Button ("Clear");
        private Button btnExit = new Button ("Exit");
        private final TextField coordField = new TextField ("Coorddinates");
        private TextField xCoord = new TextField();
        private TextField yCoord = new TextField();
        
        public PanelButtons () {
            //Left Panel for buttons - Color, Clear and Exit
            Panel leftPanel = new Panel (new GridLayout (9,1));
            leftPanel.add(btnRed);
            leftPanel.add(btnBlue);
            leftPanel.add(btnGreen);
            
            leftPanel.add(btnClear);
            leftPanel.add(btnExit);
            
            //Coordinates Field
            leftPanel.add(coordField);
            leftPanel.add(xCoord);
            leftPanel.add(yCoord);
            coordField.setBackground (Color.WHITE);
            coordField.setEditable (false);
            
            //Main screen with points
            add(leftPanel, BorderLayout.WEST );
            
            //Exit the program
            addWindowListener (new WindowAdapter () {
                
                @Override
                public void windowClosing(WindowEvent e) {
                    System.exit(0);
                }
            });
            //Getting the Coordinates and creating the points
            addMouseListener (new MouseAdapter  () {
                @Override
                public void mousePressed(MouseEvent e) {
                    Frame frame = (Frame) e.getSource();
                    Graphics g = frame.getGraphics ();
                    g.setColor(Color.yellow);
                    g.fillOval(e.getX()-4, e.getY()- 4, 22, 22);
                    
                    xCoord.setText ("" + e.getX ());
                    yCoord.setText ("" + e.getY ());
                }
            });
            
            //Exit the program
            btnExit.addActionListener (new ActionListener () {
                @Override
                public void actionPerformed(ActionEvent ae) {
                    System.exit(0);
                }   
            });
            
            // Clearing Desktop
            btnClear.addActionListener (new ActionListener () {

                @Override
                public void actionPerformed(ActionEvent ae) {
                    repaint();
                    xCoord.setText ("");
                    yCoord.setText ("");
                }
                
            });
            
            // Действието на бутоните в смяна цвета на задният фон
            btnRed.addActionListener (new ActionListener () {

                @Override
                public void actionPerformed(ActionEvent ae) {
                    setBackground (Color.RED);
                    xCoord.setText ("");
                    yCoord.setText ("");
                }
            });
            btnBlue.addActionListener (new ActionListener () {

                @Override
                public void actionPerformed(ActionEvent ae) {
                    setBackground (Color.BLUE);
                    xCoord.setText ("");
                    yCoord.setText ("");
                }
            });
            btnGreen.addActionListener (new ActionListener () {

                @Override
                public void actionPerformed(ActionEvent ae) {
                    setBackground (Color.GREEN);
                    xCoord.setText ("");
                    yCoord.setText ("");
                }
            });
            
            //Name and Size for the Frame
            setTitle ("Points");
            setSize (700,350);
            setVisible (true);
        }
        
       
    }
   
    public static void main(String[] args) {
        // TODO code application logic here
        PanelButtons panelButtons = new PanelButtons();
        
       
    }
}
    
    