/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package threadsapplet1;
import java.applet.Applet;
import java.awt.*;

/**
 *
 * @author Axel
 */
public class ThreadsApplet1 {
    public static class ThreadsApplet2 extends Applet {
    Panel panel1, panel2;
    Label thread1, thread2;
    Button start1, start2, stop1, stop2;
    TextField tField1, tField2;
    Choice step1, step2;
    
    
    public  ThreadsApplet2 () {
                setBackground (Color.GRAY);
        setLayout (new GridBagLayout ());
        GridBagConstraints p1 = new GridBagConstraints ();
        tField1 = new TextField ("", 20);
        tField2 = new TextField ("", 20);
        step1 = new Choice();
            step1.add("1");
            step1.add("2");
            step1.add("3");
            step1.add("5");
            step1.add("7");
            step1.add("9");
        step2 = new Choice();
            step2.add("1");
            step2.add("2");
            step2.add("3");
            step2.add("5");
            step2.add("7");
            step2.add("9");
        start1 = new Button ("Start");
        start2 = new Button ("Start");
        stop1 = new Button ("Stop");
        stop1 = new Button ("Stop");
            
        thread1 = new Label ("Thread 1");
        thread2 = new Label ("Thread 2");
       // setLayout(new GridLayout (2,1));
        //p1.setLayout(new FlowLayout());
       /* p1.add(new Label ("Threads 1"));
        p1.add(tField1);
        p1.add(new Label ("Step:"));
        p1.add(step1);
        p1.add(start1);
        p1.add(stop1);
        
        //p2.setLayout (new GridLayout(4,2));
        p2.add(new Label ("Threads 2"));
        p2.add(tField2);
        p2.add(new Label ("Step:"));
        p2.add(step2);
        p2.add(start2);
        p2.add(stop2);
        */

        //First Line ******************************
        p1.fill =  GridBagConstraints.BOTH;
        p1.insets = new Insets (5,5,5,5);
        //TextField
        p1.gridx = 1; p1.gridy = 0;
        p1.gridheight = 1; p1.gridwidth = 1;
        add(thread1,p1);
        //Add Button
        p1.gridx = 1; p1.gridy = 0;
        p1.gridheight = 1; p1.gridwidth = 1;
        add(thread2,p1);
       
        //End First Line ****************************
        
        //Second Line *******************************
       //Left List
        p1.gridx = 0; p1.gridy = 1;
        p1.gridheight = 6; p1.gridwidth = 2;
        add(tField1,p1);
        //Center Buttons
        p1.gridx = 6; p1.gridy = 5;
        p1.gridheight = 1; p1.gridwidth = 1;
        add(tField2,p1);
        
        //End Second Line ****************************
        
        //Third Line - Counters
        p1.gridx = 1; p1.gridy = 10;
       add(step1,p1);
        
        p1.gridx = 9; p1.gridy = 10;
        add(step2,p1);
        
            //setTitle ("Threads");
            //setSize (700,350);
            setVisible (true);
    }
}

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        ThreadsApplet2 threadsApp = new ThreadsApplet2();
       
        // TODO code application logic here
    }
}
