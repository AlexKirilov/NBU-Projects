/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package interfacetextarayhm;

import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.KeyEvent;
import java.awt.event.WindowAdapter;
import java.awt.event.WindowEvent;

/**
 *
 * @author Alex Kirilov Kirilov f65063
 */
public class InterFaceTextArayHM extends Frame implements ActionListener{
    private Button addButton, LButton, RButton, UpButton, DownButton;
    TextField inputTF;
    List LList, RList;
    Label Lcounter, Rcounter;
    GridBagLayout gridbag;
    
    public InterFaceTextArayHM () {
         GComponents();
        
        //Using GridBagLayout
        //from: http://www.tns.lcs.mit.edu/manuals/java-api-old/java.awt.GridBagLayout.html
       
        GridBagLayout gBag = new GridBagLayout ();
        GridBagConstraints c = new GridBagConstraints();
        setFont (new Font("Ariel",Font.PLAIN ,14));
        setLayout (gridbag);
        
        inputTF = new TextField(40);
        LList = new List(20);
        addButton = new Button ("Add");
        
        add (inputTF, gridbag);
        add (addButton, gridbag);
        add (LList, gridbag);
        
        
        addWindowListener(new WindowAdapter() {
            @Override
            public void windowClosing(WindowEvent we) {
                System.exit(0);
            }
        });
        setTitle ("HomeWork");
        setVisible (true);
        pack();
    
    }

    @Override
    public void actionPerformed(ActionEvent ae) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    public static void main(String[] args) {
        // TODO code application logic here
            new InterFaceTextArayHM ();
    }

    public void GComponents() {
        addButton.addActionListener (new ActionListener () )
                {
    @Override
        public void actionPerformed (ActionEvent e) 
        {
         if (e.getKeyCode() == KeyEvent.VK_ENTER) {
             if (!inputTF.getText().isEmpty()) 
             {
                 
             }
         }   
        }
        
    }
    }
}
