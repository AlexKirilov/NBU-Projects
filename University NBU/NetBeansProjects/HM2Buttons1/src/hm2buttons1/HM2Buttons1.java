/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package hm2buttons1;

import java.awt.BorderLayout;
import java.awt.Button;
import java.awt.FlowLayout;
import java.awt.Frame;
import java.awt.GridLayout;

/**
 *
 * @author Axel
 */
public class HM2Buttons1 {

    /**
     * @param args the command line arguments
     */
    public static class BorderLayoutButtons extends Frame {
        //Ляво стоящите бутонни
        Button btn11 = new Button ("Button 11");
        Button btn12 = new Button ("Button 12");
        Button btn13 = new Button ("Button 13");
        public BorderLayoutButtons (){
         add (btn11, BorderLayout.EAST);
         add (btn12, BorderLayout.EAST);
         add (btn13, BorderLayout.EAST);
         setVisible (true);
        }
    }
        //Централните бутони:
        public static class GridLayoutButtons extends Frame {
        Button btn21 = new Button ("Button 21");
        Button btn22 = new Button ("Button 22");
        Button btn23 = new Button ("Button 23");
        Button btn24 = new Button ("Button 24");
         public GridLayoutButtons(){
            setLayout (new GridLayout (2,2));
            add(btn21);
            add(btn22);
            add(btn23);
            add(btn24);
            setVisible (true);
          }
        }
        //Footer buttons
        public static class FlowLayoutButtons1 extends Frame {
        Button btn31 = new Button ("Button 31");
        Button btn32 = new Button ("Button 32");
        Button btn33 = new Button ("Button 33");        
   
        public FlowLayoutButtons1 () {
            setLayout (new FlowLayout());
            add(btn31 );
            add(btn32 );
            add(btn33 );
            setVisible(true);
         }
        }
            /*//Center Buttons
            add(btn21 ,BorderLayout.CENTER);
            add(btn22 ,BorderLayout.CENTER);
            add(btn23 ,BorderLayout.CENTER);
            add(btn24 ,BorderLayout.CENTER);
            //Footer Buttons
            add(btn31 ,BorderLayout.SOUTH);
            add(btn32 ,BorderLayout.SOUTH);
            add(btn33 ,BorderLayout.SOUTH);
            //setTitle ("BorderLayout");
            setTitle ("FlowLayout");
            setVisible (true);
        */
    
    public static void main(String[] args) {
        // TODO code application logic here
       // BorderLayout BorderLayoutButtons = new BorderLayout ();
        new BorderLayoutButtons ();
        new FlowLayoutButtons1 ();
        new GridLayoutButtons ();
    }

        private void setVisible(boolean b) {
            throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
        }

        private void setTitle(String borderLayout) {
            throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
        }

        private void add(Button btn11, String EAST) {
            throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
        }
    }
