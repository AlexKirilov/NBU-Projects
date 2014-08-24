/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package boxradio;

import java.awt.*;
import java.awt.event.*;

/**
 *
 * @author Axel
 */
public class BoxRadio {

    /**
     * @param args the command line arguments
     */
    public static class ButtonCounterDemo extends Frame {
	Panel panelLeft = new Panel();
	Panel panelRight = new Panel();
	Panel pnlCount = new Panel();
	Panel pnlClear = new Panel();
	CheckboxGroup ckbxgPlusMinus = new CheckboxGroup();
	CheckboxGroup ckbxgStep = new CheckboxGroup();
	Checkbox ckbxAscend = new Checkbox("Ascending",true,ckbxgPlusMinus);
	Checkbox ckbxDescend = new Checkbox("Descending",false,ckbxgPlusMinus);
	Checkbox ckbxStep1 = new Checkbox("Step 1",true,ckbxgStep);
	Checkbox ckbxStep5 = new Checkbox("Step 5",false,ckbxgStep);
	Checkbox ckbxStep10 = new Checkbox("Step 10",false,ckbxgStep); 
	Button btnCount = new Button("ClickMe!");
	Button btnClear = new Button("Clear");
	Label lblDisplay = new Label("0");
	Label lblEmpty = new Label("");
	int step = 1;
	int counter = 0;
	
	public ButtonCounterDemo () {
		panelLeft.setLayout(new GridLayout(6,1));
		panelLeft.add(ckbxAscend);
		panelLeft.add(ckbxDescend);
		panelLeft.add(lblEmpty);
		panelLeft.add(ckbxStep1);
		panelLeft.add(ckbxStep5);
		panelLeft.add(ckbxStep10);
		add(panelLeft,BorderLayout.WEST);		
		panelRight.setLayout(new GridLayout(3,1));
		btnCount.setSize(60,getHeight());
		btnClear.setSize(60,getHeight()); 
		panelRight.add(btnCount);
		lblDisplay.setAlignment(Label.RIGHT);
		panelRight.add(lblDisplay);
		panelRight.add(btnClear);
		add(panelRight,BorderLayout.EAST);
		
		btnCount.addActionListener(new ButtonHandler());
		btnClear.addActionListener(new ButtonHandler());
		
		ckbxAscend.addItemListener(new CheckBoxHandler());
		ckbxDescend.addItemListener(new CheckBoxHandler());
		ckbxStep1.addItemListener(new CheckBoxHandler());
		ckbxStep5.addItemListener(new CheckBoxHandler());
		ckbxStep10.addItemListener(new CheckBoxHandler());
		addWindowListener(new WindowClosing());	
		setTitle("ButtonCounterDemo");
		setSize(300,200);
		setResizable(false);
		setVisible(true);
	}
	
	class ButtonHandler implements ActionListener {
                @Override
		public void actionPerformed (ActionEvent e) {
			Button btn = (Button) e.getSource();
			if (btn.equals(btnCount)) {
				counter += step;
				if ((counter < 0) || (counter > 100))
					btnCount.setEnabled(false);
				else
				   lblDisplay.setText(((Integer)(counter)).toString());

			}
			else 
			   if (btn.equals(btnClear)){
			   	  lblDisplay.setText("0");
			   	  counter = 0;
			   	  btnCount.setEnabled(true); 
			   }	  
		}
	}
	
	class CheckBoxHandler implements ItemListener {
                @Override
		public void itemStateChanged (ItemEvent e) { 
			Checkbox ckb = (Checkbox)e.getSource();
			if (ckb.equals(ckbxAscend)) {
				if (step < 0)
					step = - step;
				if ((!btnCount.isEnabled())&& ((counter - step) <  0))
					btnCount.setEnabled(true);
			}
			if (ckb.equals(ckbxDescend)) {
				if (step > 0)
					step = - step;
				if ((!btnCount.isEnabled())&& ((counter - step) > 100))
					btnCount.setEnabled(true);
			}
			if (ckb.equals(ckbxStep1))
				step = sign(step)*1;
			else
				if (ckb.equals(ckbxStep5))
					step = sign(step)*5;
				else 
					if (ckb.equals(ckbxStep10))
						step = sign(step)*10;
		}
	}
	
	class WindowClosing extends WindowAdapter {
                @Override
		public void windowClosing (WindowEvent e) {
			System.exit(0);
		}
	}
	
	private int sign(int s) {
		if (s < 0) return -1;
		else       return +1;
	}
    }
    
    public static void main(String[] args) {
		ButtonCounterDemo btnCounter = new ButtonCounterDemo();    	
    }
}