/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package javatest1;
import javax.swing.*;
/**
 *
 * @author Axel
 */
public class JavaTest1 extends JFrame {

  public JavaTest1() {
    super(“HelloWorldSwing”);
    final JLabel label = new JLabel("Hello World");
    getContentPane().add(label);
    setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
    pack();
    setVisible(true);
  }

    public static void main(String[] args) {
        // TODO code application logic here
    JavaTest1 frame = new JavaTest1();
    }
}
