package newinterfacearay2;

import java.awt.BorderLayout;
import java.awt.Button;
import java.awt.Color;
import java.awt.FlowLayout;
import java.awt.Frame;
import java.awt.GridBagConstraints;
import java.awt.GridBagLayout;
import java.awt.GridLayout;
import java.awt.Label;
import java.awt.List;
import java.awt.Panel;
import java.awt.Insets;
import java.awt.TextField;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.KeyAdapter;
import java.awt.event.KeyEvent;
import java.awt.event.WindowAdapter;
import java.awt.event.WindowEvent;

/**
 *
 * @author Alex Kirilov Kirilov f65063
 */
public class NewInterFaceAray2 extends Frame implements ActionListener {

        Button addButton, UpButton, DownButton, LButton, RButton;
        TextField inputTF;
        List LList, RList;
        Label LCounter, RCounter;
    public NewInterFaceAray2 () {
        setBackground (Color.GRAY);
        setLayout (new GridBagLayout ());
        GridBagConstraints p1 = new GridBagConstraints ();
        //First Line ******************************
        p1.fill =  GridBagConstraints.BOTH;
        p1.insets = new Insets (5,5,5,5);
        //TextField
        p1.gridx = 0; p1.gridy = 0;
        p1.gridheight = 1; p1.gridwidth = 1;
        inputTF = new TextField ("",10);
        add(inputTF,p1);
        //Add Button
        p1.gridx = 1; p1.gridy = 0;
        p1.gridheight = 1; p1.gridwidth = 1;
        addButton = new Button ("Add");
        add(addButton,p1);
        //UpButton
        p1.gridx = 8; p1.gridy = 0;
        p1.gridheight = 1; p1.gridwidth = 1;
        UpButton = new Button ("Up");
        add(UpButton,p1);
        
        //DownButton
        p1.gridx = 9; p1.gridy = 0;
        p1.gridheight = 1; p1.gridwidth = 1;
        DownButton = new Button ("Down");
        add(DownButton,p1);
        //End First Line ****************************
        
        //Second Line *******************************
       //Left List
        p1.gridx = 0; p1.gridy = 1;
        p1.gridheight = 6; p1.gridwidth = 2;
        LList = new List (15);
        add(LList,p1);
        //Center Buttons
        p1.gridx = 6; p1.gridy = 5;
        p1.gridheight = 1; p1.gridwidth = 1;
        LButton = new Button ("<<");
        add(LButton,p1);
        
        p1.gridx = 6; p1.gridy = 3;
        p1.gridheight = 1; p1.gridwidth = 1;
        RButton = new Button (">>");
        add(RButton,p1);
        //Right List;
        p1.gridx = 8; p1.gridy = 1;
        p1.gridheight = 8; p1.gridwidth = 6;
        RList = new List (10);
        add (RList,p1);
        //End Second Line ****************************
        
        //Third Line - Counters
        p1.gridx = 0; p1.gridy = 10;
        LCounter = new Label ("Count : 0");
        add(LCounter,p1);
        
        p1.gridx = 9; p1.gridy = 10;
        RCounter = new Label ("Count : 0");
        add(RCounter,p1);
        
        
        UpButton.addActionListener ((ActionListener) this);
        DownButton.addActionListener ((ActionListener) this);


       inputTF.addKeyListener(new KeyAdapter() {
            @Override
            public void keyPressed(KeyEvent e) {
                if(e.getKeyCode() == KeyEvent.VK_ENTER){
                    if( ! inputTF.getText().trim().isEmpty()) {
                        LList.add(inputTF.getText().trim());
                        LCounter.setText("Count : " + LList.getItemCount());
                        inputTF.setText(null);
                        inputTF.requestFocus();
                    }
                    
                }
            }
        });
       addButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                if( ! inputTF.getText().trim().isEmpty()) {
                    LList.add(inputTF.getText().trim());
                    LCounter.setText("Count : " + LList.getItemCount());
                    inputTF.setText(null);
                    inputTF.requestFocus();
                }
            }
        });
       
       RButton.addActionListener(new ActionListener() {

            @Override
            public void actionPerformed(ActionEvent e) {
                if(LList.getSelectedItem() != null) {
                    RList.add(LList.getSelectedItem());
                    LList.remove(LList.getSelectedItem());
                    LCounter.setText("Count : " + LList.getItemCount());
                    RCounter.setText("Count : " + RList.getItemCount());
                }
            }
        });
        
        RButton.addActionListener(new ActionListener() {

            @Override
            public void actionPerformed(ActionEvent e) {
                if (RList.getSelectedItem() != null ) {
                    LList.add(RList.getSelectedItem());
                    RList.remove(RList.getSelectedItem());
                    LCounter.setText("Count : " + LList.getItemCount());
                    RCounter.setText("Count : " + RList.getItemCount());
                }
            }
        });
    
        
        addWindowListener(new WindowAdapter() {
            @Override
            public void windowClosing(WindowEvent we) {
                System.exit(0);
            }
        });

        pack();
        setSize (500,500);
        setTitle ("HomeWork");
        setVisible (true);
        
    }   
    public static void main(String[] args) {
            NewInterFaceAray2 newInterFaceAray2 = new NewInterFaceAray2();
    }
    
    @Override
    public void actionPerformed (ActionEvent e) {
        if (e.getSource ().equals(UpButton)) {
            if (RList.getSelectedIndex () > 0 )
            {
                int indexx = RList.getSelectedIndex ();
                String replaced = RList.getItem (indexx-1);
                RList.replaceItem(RList.getSelectedItem(), indexx-1);
                RList.replaceItem(replaced, indexx);
            }   
        }
        if(e.getSource().equals(DownButton)) {
            if(RList.getSelectedIndex() < RList.getItemCount() -1
                    && RList.getSelectedIndex() > -1) {
                
                int ind = RList.getSelectedIndex();
                String replaced = RList.getItem(ind+1);
                RList.replaceItem(RList.getSelectedItem(), ind+1);
                RList.replaceItem(replaced, ind);
                
            }
        }
    }
}
