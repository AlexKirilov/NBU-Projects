/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package interfacehm;

import java.awt.*;
import java.awt.event.*;

/**
 *
 * @author Aleksandar Kirilov f65063
 */
public class InterFaceHM {

    /**
     * @param args the command line arguments
     */
    public static class InterFace extends Frame {

        Panel lPanel = new Panel();
        Panel rPanel = new Panel();
        //Panel pCounter = new Panel ();
        //Panel pClear   = new PAnel ();
        CheckboxGroup cbgPlusMinus = new CheckboxGroup();
        Checkbox cbAsc = new Checkbox("Ascend", true, cbgPlusMinus);
        Checkbox cbDesc = new Checkbox("Descend", false, cbgPlusMinus);
        CheckboxGroup cbgSteps = new CheckboxGroup();
        Checkbox cbSt1 = new Checkbox("Step 1 ", true, cbgSteps);
        Checkbox cbSt5 = new Checkbox("Step 5 ", false, cbgSteps);
        Checkbox cbSt10 = new Checkbox("Step 10", false, cbgSteps);
        Button btnClick = new Button("Press ME!!!");
        Button btnClear = new Button("Clear");
        int step = 1;
        int counter = 0;
        Label lbDisplay = new Label("0");    //Text display for the counter;
        Label lbEmpty = new Label("");       //Text display for empty space between Radio-Buttons

        public InterFace() {
            setFont(new Font("Arial", Font.BOLD, 11));

            //Left Panel with Radio-Buttones
            lPanel.setLayout(new GridLayout(6, 1));
            add(lPanel, BorderLayout.WEST);
            lPanel.add(cbAsc);      //Adding the Button
            cbAsc.addItemListener   (new CheckBoxPointer()); //Actions When the CheckBox is pointed
            lPanel.add(cbDesc);
            cbDesc.addItemListener  (new CheckBoxPointer());
            lPanel.add(lbEmpty);    //Празно пространство;
            lPanel.add(cbSt1);      //Adding the CheckBox
            cbSt1.addItemListener   (new CheckBoxPointer());
            lPanel.add(cbSt5);
            cbSt5.addItemListener   (new CheckBoxPointer());
            lPanel.add(cbSt10);
            cbSt10.addItemListener  (new CheckBoxPointer());


            //Right Panel with Buttons - Count and Clear;
            rPanel.setLayout(new GridLayout(3, 1));
            add(rPanel, BorderLayout.WEST);
            rPanel.add(btnClick);
            //btnClick.setSize (70,40);
            btnClick.addActionListener(new PressingButton());
            rPanel.add(btnClear);
            //btnClear.setSize (70,140);
            btnClear.addActionListener(new PressingButton());
            rPanel.add(lbDisplay);
            //lbDisplay.setSize (70,40);
            lbDisplay.setAlignment(Label.CENTER);


            //Exit - X Win-Button.
            addWindowListener(new WindowAdapter() {
                @Override
                public void windowClosing(WindowEvent ae) {
                    System.exit(0);
                }
            });


            pack();
            setTitle("Poni4ki");
            setSize(350, 250);
            setVisible(true);
        }

        abstract class CheckBoxPointer implements ItemListener {

            public CheckBoxPointer(ItemEvent ie) {
                Checkbox cb = (Checkbox) ie.getSource();
                if (cb.equals(cbAsc)) {
                    if (step < 0)     step = -step;
                    
                }
                if (cb.equals(cbDesc)) {
                    if ( step > 0)    step = -step;
                }
                if      (cb.equals(cbSt1))  step = sign(step)*1;
                else if (cb.equals(cbSt5))  step = sign(step)*5;
                else if (cb.equals(cbSt10)) step = sign(step)*10;
            }
        }
        
        //Proverka za znaka pred chisloto.
        private int sign (int s){
            if   (step < 0) return -1;
            else            return +1;
        }

        abstract class PressingButton implements ActionListener {

            public PressingButton(ActionEvent ae) {
                Button btn = (Button) ae.getSource();
                if (btn == btnClick) {
                    counter += step;
                } else if (btn == btnClear) {
                    lbDisplay.setText ("0");
                    counter = 0;
                }
            }
        }
    }

    public static void main(String[] args) {
        // TODO code application logic here
        InterFace chx = new InterFace();
    }
}