/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package kontrolno1;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.ItemEvent;
import java.awt.event.ItemListener;
import java.awt.event.WindowAdapter;
import java.awt.event.WindowEvent;



/**
 *
 * @author Radoslav f65138
 */
public class Kontrolno1 extends Frame{
    MenuBar menu = new MenuBar();
    Menu file = new Menu("File");
    Menu edit = new Menu("Edit");
    Menu help = new Menu("Help");
    MenuItem newItem = new MenuItem("New");
    MenuItem openItem = new MenuItem("Open");
    MenuItem saveItem = new MenuItem("Save");
    MenuItem exitItem = new MenuItem("Exit");
    MenuItem copyItem = new MenuItem("Copy");
    MenuItem pasteItem = new MenuItem("Paste");
    MenuItem clearItem = new MenuItem("Clear");
    MenuItem addItem = new MenuItem("Add");
    MenuItem aboutItem = new MenuItem("About");
    Button btnClear = new Button("Clear");
    Button btnAdd = new Button("Add");
    List list = new List(7);
    CheckboxGroup chekGroup = new CheckboxGroup();
    Checkbox toUpper = new Checkbox("to Upper",false,chekGroup);
    Checkbox toLower = new Checkbox("to Lower",false,chekGroup);
    TextArea textArea = new TextArea(7,35);
    Panel topPanel = new Panel();
    Panel topIner = new Panel();
    Panel botPanel = new Panel();
    Label empt = new Label("");
    Panel botIner =new Panel();
    Label empt2 = new Label("");
    Label empt3 = new Label("");
    Label empt4 = new Label("");
    Panel empty = new Panel();
    
    public Kontrolno1(){
        newItem.setEnabled(false);
        openItem.setEnabled(false);
        saveItem.setEnabled(false);
        copyItem.setEnabled(false);
        pasteItem.setEnabled(false);
        clearItem.setEnabled(false);
        topPanel.add(textArea);
        topPanel.add(topIner);
        topIner.add(btnAdd);
        topIner.add(empt);
        topIner.add(btnClear);
        topIner.setLayout(new GridLayout(3,1));
        botPanel.add(list);
        botPanel.add(botIner);
        
        botIner.add(toUpper);
        botIner.add(empt3);
        botIner.add(toLower);
        botIner.setLayout(new GridLayout(3,1));
        empty.add(empt2);
        empty.setLayout(new BorderLayout(10, 10));
        add(topPanel,BorderLayout.NORTH);
        add(empty,BorderLayout.CENTER);
        add(botPanel,BorderLayout.SOUTH);
        file.add(newItem);
        file.add(openItem);
        file.add(saveItem);
        file.addSeparator();
        file.add(exitItem);
        edit.add(copyItem);
        edit.add(pasteItem);
        edit.add(clearItem);
        edit.add(addItem);
        help.add(aboutItem);
        setMenuBar(menu);
        menu.add(file);
        menu.add(edit);
        menu.add(help);
        
        addItem.addActionListener(new actionClick());
        exitItem.addActionListener(new actionClick());
        addWindowListener(new windowClose());
        btnClear.addActionListener(new ButtonHandler());
        btnAdd.addActionListener(new ButtonHandler());
        toUpper.addItemListener(new chekHandler());
        toLower.addItemListener(new chekHandler());
        setTitle("Radoslav Alexandrov F:65138");
        setVisible(true);
        setSize(350, 350);
    }
    public static void main(String[] args) {
        Kontrolno1 kontr = new Kontrolno1();
    }
    class windowClose extends WindowAdapter{
        public void windowClosing(WindowEvent e){
            System.exit(0);
        }
    }
    class ButtonHandler implements ActionListener{
        public void actionPerformed(ActionEvent e){
            Button btn = (Button) e.getSource();
            if(btn == btnClear){
                
                textArea.setText(" ");
                textArea.requestFocus();
            }else{
                list.add(textArea.getText());
                textArea.setText("");
                textArea.requestFocus();
            }
        }
    }
    class chekHandler implements ItemListener{
    public void itemStateChanged(ItemEvent e){
        Checkbox ckb = (Checkbox) e.getSource();
        if(ckb.equals(toUpper)){
            textArea.setText(textArea.getText().toUpperCase());
        }else{
            textArea.setText(textArea.getText().toLowerCase());
        }
    }
    }
    
    class actionClick implements ActionListener{
        
        public void actionPerformed(ActionEvent e){
            MenuItem mi = (MenuItem) e.getSource();
            if(mi.equals(exitItem)){
            System.exit(0);
            }else{
                if(mi.equals(addItem)){
                    list.add(textArea.getText());
                    textArea.setText("");
                    textArea.requestFocus();
                }else{
                    if(mi.equals(aboutItem)){
                        
                    }
                }
            }
        }
    }

}
