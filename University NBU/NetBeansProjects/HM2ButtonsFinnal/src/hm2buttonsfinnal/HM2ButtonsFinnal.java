/*  * To change this template, choose Tools | Templates
    * and open the template in the editor.             */
package hm2buttonsfinnal;

import java.awt.*;
import java.awt.event.WindowAdapter;
import java.awt.event.WindowEvent;

/** * * @author Axel */
public class HM2ButtonsFinnal {
    /*** @param args the command line arguments*/
    
    //"Panel" контейнер, който ще ни послужи за общата Форма
    public static class PanelButtons extends Frame {
        //Компоненти за layoutmanger-a
        Panel pnlFlow1 = new Panel ();
        Panel pnlGrid   = new Panel ();
        Panel pnlFlow2   = new Panel ();
        
        public PanelButtons () {
            //Първи ляв контейнер.
            pnlFlow1.setLayout(new GridLayout (0,1));
            /*for (int i=0; i<3; i++) { pnlGrid.add(new Button ("Buttons1"+(i+1)));}
            add (pnlGrid, BorderLayout.WEST);*/
            pnlFlow1.add (new Button ("Button 11"));
            pnlFlow1.add (new Button ("Button 12"));
            pnlFlow1.add (new Button ("Button 13"));
            add(pnlFlow1, BorderLayout.WEST);
            
            //Втори централен контайнер.
            pnlGrid.setLayout(new GridLayout (2,2));
            pnlGrid.add (new Button ("Button 21"));
            pnlGrid.add (new Button ("Button 22"));
            pnlGrid.add (new Button ("Button 23"));
            pnlGrid.add (new Button ("Button 24"));
            add(pnlGrid, BorderLayout.EAST);
            
            //Трети южен контайнер или footer
            pnlFlow2.setLayout(new FlowLayout ());
            pnlFlow2.add (new Button ("Button 31"));
            pnlFlow2.add (new Button ("Button 32"));
            pnlFlow2.add (new Button ("Button 33"));
            add(pnlFlow2, BorderLayout.SOUTH);
            
            addWindowListener(new WindowAdapter() {
            @Override
            public void windowClosing(WindowEvent we) {
                System.exit(0);
            }
            });
            setTitle ("Homework2.1");   //Заглавието на frame-a.
            setSize  (230, 170);        //размера на fram-a.
            setVisible (true);          //Правиго Видим за потребителя.
        }
    }
        
    public static void main(String[] args) {
        // TODO code application logic here
        PanelButtons panelButtons = new PanelButtons ();
    }
}
