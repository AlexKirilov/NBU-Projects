/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package javastudyles1;


/**
 *
 * @author Axel
 */

import java.awt.*; 

/**
 *
 * @author Axel
 */
public class BorderLayoutDemo extends Frame{ 
	Button btn1 = new Button("Button 1"); 
	Button btn2 = new Button("Button 2"); 
	Button btn3 = new Button("Button 3"); 
	Button btn4 = new Button("Button 4"); 
	Button btn5 = new Button("Button 5"); 
	public BorderLayoutDemo() { 
		add(btn1, BorderLayout.NORTH); 
		add(btn2, BorderLayout.WEST); 
		add(btn3, BorderLayout.CENTER); 
		add(btn4, BorderLayout.EAST); 
		add(btn5, BorderLayout.SOUTH); 
		setTitle("BorderLayout"); setVisible(true); 
	} 
	public static void main(String args[]) { 
            BorderLayoutDemo borderLayoutDemo = new BorderLayoutDemo(); 
	} 
}

        
