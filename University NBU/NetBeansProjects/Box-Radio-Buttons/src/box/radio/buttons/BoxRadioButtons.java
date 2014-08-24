/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package box.radio.buttons;

import java.awt.Button;
import java.awt.Checkbox;
import java.awt.CheckboxGroup;
import java.awt.Frame;
import java.awt.Panel;
import java.awt.TextField;

/**
 *
 * @author Axel
 */
public class BoxRadioButtons {

    /**
     * @param args the command line arguments
     */
    public static class CheckBoxButt extends Frame {
        private Button btnExit = new Button ("Press ME!");
        private Button btnClear = new Button ("Clear");
        private TextField count = new TextField();
        
        public CheckBoxButt () {
            Panel panelP1, panelP2;
            Checkbox cb1f1,vcb1f2;
            Checkbox cb2f1, cb2f2, cb2f3;
            CheckboxGroup cbg;

            setSize  (230, 170);        //размера на fram-a.
            setVisible (true);
        }
        
    }
    public static void main(String[] args) {
        // TODO code application logic here
        CheckBoxButt ch = new CheckBoxButt ();
    }
}
