
package svoevolie1;

import java.awt.BorderLayout;
import java.awt.Button;
import java.awt.Checkbox;
import java.awt.CheckboxGroup;
import java.awt.Color;
import java.awt.Frame;
import java.awt.Graphics;
import java.awt.GridBagConstraints;
import java.awt.GridBagLayout;
import java.awt.GridLayout;
import java.awt.Label;
import java.awt.Panel;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.awt.event.WindowAdapter;
import java.awt.event.WindowEvent;

/**
 *
 * @author Axel
 */
public class Svoevolie1 extends Frame implements ActionListener 
{
    
        Panel p1, p2; //p1 - Graphic Panel / p2 - TouchPanel + TextAray       
        Button btnSubmit, btnClear, btnExit;
        CheckboxGroup cbg1CP, cbg2CM, cbg3Phig; //Checkbox Groups
        Checkbox ch1RectB, ch2RectW, ch3RectR, ch4CircB, ch5CircW; // Graphic CheckBoxes
        Checkbox chMBlack, chMYellow, chMBrown; //Checkbox Mouse Color
        Checkbox chMGRect, chMGOval;
        Checkbox cbCPR,cbCPB,cbCPG; //Color Panel
        Label text1, text2, freeSpace;
        
    public void Svoevolie1 () {
        setBackground (Color.GRAY);
        //setLayout (new GridBagLayout ());
        //GridBagConstraints gbc = new GridBagConstraints ();
       
        //Left Panel for Graphics
        p1 = new Panel (new GridLayout (8,1));
        p1.add(text1);
        p1.add(freeSpace);
        p1.add(ch1RectB);   p1.add(ch2RectW);
        p1.add(ch3RectR);   p1.add(ch4CircB);
        p1.add(ch5CircW);
        p1.add(freeSpace);
        p1.add(btnSubmit);
        
        /*
            //Main screen with points
            add(leftPanel, BorderLayout.WEST );
        */
    
    /* //Main Rectangle with blue color;
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
*/
        //Getting the Coordinates and creating the points
            addMouseListener (new MouseAdapter  () {
                @Override
                public void mousePressed(MouseEvent e) {
                    Frame frame = (Frame) e.getSource();
                    Graphics g = frame.getGraphics ();
                    // Mouse Color Point
                    if (chMBlack.Checked) {g.setColor (Color.BLACK); }
                    if (chMBrown.Checked) {g.setColor (Color.GRAY);  }
                    if (chMYellow.Checked) {g.setColor(Color.yellow); }
                    //Mouse Graphic Type View
                    if (chMGOval.Checked) { g.fillOval(e.getX()-4, e.getY()- 4, 22, 22); }
                    if (chMGRect.Checked) { g.fillRect(e.getX()-4, e.getY()- 4, 22, 22); }

                }
            });
    
            //Exit the program
            addWindowListener (new WindowAdapter () {
                
                @Override
                public void windowClosing(WindowEvent e) {
                    System.exit(0);
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
                   
                }
                
            });
    
    pack();
    setSize (700,500);
    setVisible (true);
    }
    public static void main(String[] args) {

    }

    @Override
    public void actionPerformed(ActionEvent ae) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
}
