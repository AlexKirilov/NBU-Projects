/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package HM2J;
import java.awt.*;


/**
 *
 * @author Axel
 */
public interface Button1 {
    public class BorderLayoutButtons {
        //Ляво стоящите бутонни
        Button btn11 = new Button ("Button 11");
        Button btn12 = new Button ("Button 12");
        Button btn13 = new Button ("Button 13");
        
        //Централните бутони:
        Button btn21 = new Button ("Button 21");
        Button btn22 = new Button ("Button 22");
        Button btn23 = new Button ("Button 23");
        Button btn24 = new Button ("Button 24");
        
        //Footer buttons
        Button btn31 = new Button ("Button 31");
        Button btn32 = new Button ("Button 32");
        Button btn33 = new Button ("Button 33");        
   
        public BorderLayoutButtons () {
            //EAST Buttons
            add(btn11 ,BorderLayout.EAST);
            add(btn12 ,BorderLayout.EAST);
            add(btn13 ,BorderLayout.EAST);
            //Center Buttons
            add(btn21 ,BorderLayout.CENTER);
            add(btn22 ,BorderLayout.CENTER);
            add(btn23 ,BorderLayout.CENTER);
            add(btn24 ,BorderLayout.CENTER);
            //Footer Buttons
            add(btn31 ,BorderLayout.SOUTH);
            add(btn32 ,BorderLayout.SOUTH);
            add(btn33 ,BorderLayout.SOUTH);
            setTitle ("BorderLayout");
            setVisible (true);
        }

        private void add(Button btn11, String EAST) {
            throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
        }

        private void setTitle(String borderLayout) {
            throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
        }

        private void setVisible(boolean b) {
            throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
        }
    }   
    
    
}
