
package homeworkthreads;

import java.awt.*;
import java.awt.event.*;
import java.awt.Choice;

/**
 *
 * @author Axel
 */
public abstract class HomeWorkThreads extends Frame implements ActionListener, ItemListener {
    
     //Purvonachalno sustoqnie na nishkite
        boolean runningthr1 = false;
        boolean runningthr2 = false; // pri na tiskane na button star preminavat v true
        int result1 = 0; //Shte ni posluji za subirane na rezultite
        int result2 = 0;
        //Elementi na applet-a
        
        Panel leftPanel = new Panel ();
        Panel rightPanel = new Panel ();
        
        TextField tAThread1 = new TextField (20);
        TextField tAThread2 = new TextField (20);
        //String който ще ни послужи за попълване на List-a / Step
        //private static String [] steper = {"1","2","3","5","7","9"};
        Choice step1 = new Choice ();
        Choice step2 = new Choice ();
        
        Button startT1 = new Button ("Start");
        Button stopT1  = new Button ("Stop");
        Button startT2 = new Button ("Start");
        Button stopT2  = new Button ("Stop");
        
        Label LabelThread1 = new Label ("Thread1");
        Label LabelThread2 = new Label ("Thread2");
        Label steps1 = new Label ("Step: ");
        Label steps2 = new Label ("Step: ");
        Label empty = new Label ("");
        
    public  HomeWorkThreads () {
        
        //Left Panels elements
        leftPanel.setLayout (new GridLayout (7,2));
        setBackground(Color.GRAY);
        leftPanel.setSize(250,100);
        leftPanel.add(empty, BorderLayout.NORTH);
        leftPanel.add(LabelThread1);
        leftPanel.add(empty);
        leftPanel.add(tAThread1);
        leftPanel.add(empty);
        leftPanel.add(steps1, BorderLayout.WEST);
        leftPanel.add(step1, BorderLayout.EAST);
        leftPanel.add(empty);
        leftPanel.add(startT1, BorderLayout.WEST);
        startT1.addActionListener(this);
        leftPanel.add(stopT1,  BorderLayout.EAST);
        stopT1.addActionListener (this);
        leftPanel.add(empty, BorderLayout.SOUTH);
        
        //Stop Buttons are UnEnabled
        //Enable wenn pressed start button
        stopT1.setEnabled(false);
        stopT2.setEnabled(false);
         
        //Rights Panels elements
        rightPanel.setLayout (new GridLayout (7,2));
        setBackground(Color.GRAY);
        rightPanel.setSize(250,100);
        rightPanel.add(empty, BorderLayout.NORTH);
        rightPanel.add(LabelThread2);
        rightPanel.add(empty);
        rightPanel.add(tAThread2);
        rightPanel.add(empty);
        rightPanel.add(steps2);
        rightPanel.add(step2);
        rightPanel.add(empty);
        rightPanel.add(startT2, new FlowLayout());
        startT2.addActionListener (this);
        rightPanel.add(stopT2,  new FlowLayout());
        stopT2.addActionListener (this);
        rightPanel.add(empty, BorderLayout.SOUTH);
        
        //Zapulvane na Spisucite s tqhnata stupka
        //step1.addItemListener(this);
        step1.add("1");
        step1.add("2");
        step1.add("3");
        step1.add("5");
        step1.add("7");
        step1.add("9");
        
        //step2.addItemListener(this);
        step2.add("1");
        step2.add("2");
        step2.add("3");
        step2.add("5");
        step2.add("7");
        step2.add("9");
        
        add(leftPanel,  BorderLayout.WEST);
        add(rightPanel, BorderLayout.EAST);
         
        pack();
        setTitle("F65063");
        setSize(500,300);
        setLocationRelativeTo(null);
        setBackground(Color.GRAY);
        setResizable(false);
        setVisible(true);
        
       //Exit na programata
        addWindowListener (new WindowAdapter() {
            public void windowClosing(WindowEvent e){
		System.exit(0);
	}});
        
        final threadRunner lFiller = new threadRunner(this, 1);
		lFiller.start();lFiller.suspend();
		final threadRunner rFiller = new threadRunner(this, 2);
		rFiller.start();rFiller.suspend();
       startT1.addActionListener (new ActionListener () {
                public void actionPerformed(ActionEvent ae) {
                            stopT1.setEnabled (true);
                            startT1.setEnabled (false);
                            runningthr1 = true;
                }   
            });
        
        startT2.addActionListener (new ActionListener () {
                public void actionPerformed(ActionEvent ae) {
                            stopT2.setEnabled (true);
                            startT2.setEnabled (false);
                            runningthr2 = true;
                }   
            });
        
        stopT1.addActionListener (new ActionListener () {
                public void actionPerformed(ActionEvent ae) {
                            startT1.setEnabled (true);
                            stopT1.setEnabled (false);
                            runningthr1 = false;
                }   
            });
        
        stopT2.addActionListener (new ActionListener () {
                public void actionPerformed(ActionEvent ae) {
                            startT2.setEnabled (true);
                            stopT2.setEnabled (false);
                            runningthr2 = false;
                }   
            });
        
    }
    /*public void main(String[] args) {
        HomeWorkThreads homework = new HomeWorkThreads() {

            public void actionPerformed(ActionEvent ae) {
                if (ae.equals(startT1)){
                            stopT1.setEnabled (true);
                            startT1.setEnabled (false);
                            runningthr1 = true;
                }   
        
                if (ae.equals(startT2)) {
                            stopT2.setEnabled (true);
                            startT2.setEnabled (false);
                            runningthr2 = true;
                }   
        
                if (ae.equals(stopT1)) {
                            startT1.setEnabled (true);
                            stopT1.setEnabled (false);
                            runningthr1 = false;
                }   
                
                if (ae.equals(stopT2)) {
                            startT2.setEnabled (true);
                            stopT2.setEnabled (false);
                            runningthr2 = false;
                }   
            }

            public void itemStateChanged(ItemEvent e) {
                if (e.equals(e)) {
                    System.exit (0);
                }
            }
        };
        
        threadRunner threads1 = new threadRunner ();
        threadRunner threads2 = new threadRunner ();
        threads1.run();
        threads2.run();
        // TODO code application logic here
    }*/
    
    public void start (){
        
    }
}
   