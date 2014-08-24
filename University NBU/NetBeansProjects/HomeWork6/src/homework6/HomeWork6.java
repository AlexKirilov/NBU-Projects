/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package homework6;

import java.awt.*;
import java.awt.Menu;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.KeyEvent;
import java.awt.event.WindowAdapter;
import java.awt.event.WindowEvent;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.Scanner;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Alexander Kirilov
 */
public class HomeWork6 extends Frame {

    MenuBar myMenuBar = new MenuBar();
    Menu myFileMenu = new Menu("File");
    Menu myEditMenu = new Menu("Edit");
    Menu myHelpMenu = new Menu("Help");
    MenuItem myFileOpenMenuItem = new MenuItem("Open...");
    MenuItem newMenuItem = new MenuItem("New");
    MenuItem saveMenuItem = new MenuItem("Save");
    Panel pan = new Panel();
    TextArea content = new TextArea();

    CheckboxMenuItem bold = new CheckboxMenuItem("Bold");
    CheckboxMenuItem italic = new CheckboxMenuItem("Italic");
    MenuItem myFileExitMenuItem = new MenuItem("Exit", new MenuShortcut(KeyEvent.VK_X));
    MenuItem copyMenuItem = new MenuItem("Copy", new MenuShortcut(KeyEvent.VK_Z));
    MenuItem pasteMenuItem = new MenuItem("Paste");
    MenuItem cutMenuItem = new MenuItem("Cut");
    MenuItem clearMenuItem = new MenuItem("Clear");
    MenuItem myHelpAboutMenuItem = new MenuItem("About");
    String bufferOne = "";
    Boolean bu = false;
    String str = content.getText();
    public HomeWork6() {
        setMenuBar(myMenuBar);
        setSize(500, 300);
        pan.add(content);
        content.setBackground(Color.WHITE);
        content.setSize(400, 200);

        myMenuBar.add(myFileMenu);
        myMenuBar.add(myEditMenu);
        myMenuBar.add(myHelpMenu);

        myFileOpenMenuItem.addActionListener(new menuItemListener());
        myFileExitMenuItem.addActionListener(new menuItemListener());
        copyMenuItem.addActionListener(new menuItemListener());
        myHelpAboutMenuItem.addActionListener(new menuItemListener());
        newMenuItem.addActionListener(new menuItemListener());
        cutMenuItem.addActionListener(new menuItemListener());
        pasteMenuItem.addActionListener(new menuItemListener());
        bold.addActionListener(new menuItemListener());
        italic.addActionListener(new menuItemListener());
        saveMenuItem.addActionListener(new menuItemListener());

        myFileMenu.add(newMenuItem);
        myFileMenu.add(myFileOpenMenuItem);
        myFileMenu.add(saveMenuItem);
        myFileMenu.addSeparator();
        myFileMenu.add(myFileExitMenuItem);
        myEditMenu.add(copyMenuItem);
        myEditMenu.add(pasteMenuItem);
        myEditMenu.add(cutMenuItem);
        myEditMenu.add(clearMenuItem);
        myEditMenu.add(bold);
        myEditMenu.add(italic);
        myHelpMenu.add(myHelpAboutMenuItem);
        add(pan, BorderLayout.CENTER);
        addWindowListener(new windowListener());
    }

    public static void main(String[] args) {
        HomeWork6 hm6 = new HomeWork6();
        hm6.setVisible(true);
    }

    class windowListener extends WindowAdapter {

        public void windowClosing(WindowEvent we) {
            System.exit(0);
        }
    }

    class menuItemListener implements ActionListener {

        public void actionPerformed(ActionEvent e) {

            MenuItem cmd = (MenuItem) e.getSource();

            if (cmd.equals(myFileOpenMenuItem)) {
                FileDialog dialo = new FileDialog(new Frame(), "Open");
                dialo.setFile("*.txt");
                dialo.setVisible(true);
                String sour = dialo.getDirectory() + dialo.getFile();

                try {
                    FileReader rea = new FileReader(sour);
                    char[] buff = new char[4096];
                    int len;
                    content.setText(" ");
                    while ((len = rea.read(buff)) != -1) {
                        String s = new String(buff, 0, len);
                        content.setText(s);
                    }
                    if (rea != null) {
                        rea.close();
                    }
                } catch (FileNotFoundException ex) {
                    Logger.getLogger(HomeWork6.class.getName()).log(Level.SEVERE, null, ex);
                } catch (IOException ex) {
                    Logger.getLogger(HomeWork6.class.getName()).log(Level.SEVERE, null, ex);
                }
            } else if (cmd.equals(myFileExitMenuItem)) {

                if (content.getText().length() > 2 && bu == false) {
                    final Dialog dia = new Dialog(new Frame(), "Sudarjanieto e promeneno ,da zapazq li promenite ?", true);
                    dia.add("Center", new Label("Zapazvane na promeni ?"));
                    Button ok = new Button("da");
                    Button no = new Button("ne");
                    ok.addActionListener(new ActionListener() {
                        public void actionPerformed(ActionEvent e) {
                            dia.setVisible(false);
                  ActionEvent ae = new ActionEvent((MenuItem)saveMenuItem, ActionEvent.ACTION_PERFORMED, "");
                        Toolkit.getDefaultToolkit().getSystemEventQueue().postEvent(ae);

                        }
                    });
                    no.addActionListener(new ActionListener(){
                        public void actionPerformed(ActionEvent e){
                        System.exit(0);
                        }
                    });
                    dia.add("South", ok);
                    dia.add("North", no);
                    dia.pack();
                    Dimension dd = dia.getSize();
                    Dimension pd = pan.getParent().getSize();
                    Point pl = pan.getParent().getLocation();
                    dia.setLocation(
                            pl.x + ((int) (pd.getWidth() - dd.getWidth())) / 2,
                            pl.y + ((int) (pd.getHeight() - dd.getHeight())) / 2
                    );
                    dia.setVisible(true);
                    bu = true;

                } else {
                    System.exit(0);
                }
            } else if (cmd.equals(newMenuItem)) {

                content.setText(" ");

            } else if (cmd.equals(copyMenuItem)) {
                if(content.getSelectedText().length() != 0){ 
                bufferOne = content.getSelectedText();
                
                }
            } else if (cmd.equals(myHelpAboutMenuItem)) {
                System.out.println("about");
            } else if(cmd.equals(pasteMenuItem)){ 
                Integer start = content.getSelectionStart();
                content.insert(bufferOne, start);
            } else if (cmd.equals(cutMenuItem)) {
                if(content.getSelectedText().length() != 0){
                    bufferOne = content.getSelectedText();
                    str = content.getText();
                    int i = content.getSelectionStart();
                    int p = content.getSelectionEnd();
                    content.setText(str.replace(bufferOne, ""));
                }
            } else if (cmd.equals(saveMenuItem)) {

                if (content.getText().length() < 5) {

                    final Dialog di = new Dialog(new Frame(), "Nqma Informaciq koqto da bude zapazena", true);
                    // true for modal
                    di.add("Center", new Label("Prazen Fail"));
                    Button ok = new Button("OK");
                    ok.addActionListener(new ActionListener() {
                        public void actionPerformed(ActionEvent e) {
                            di.setVisible(false);
                        }
                    });
                    di.add("South", ok);
                    di.pack();

                    // locate dialog to the center
                    Dimension dd = di.getSize();
                    Dimension pd = pan.getParent().getSize();
                    Point pl = pan.getParent().getLocation();
                    di.setLocation(
                            pl.x + ((int) (pd.getWidth() - dd.getWidth())) / 2,
                            pl.y + ((int) (pd.getHeight() - dd.getHeight())) / 2
                    );
                    di.setVisible(true);

                } else {

                    saveMenuItem.setEnabled(true);
                    FileDialog savefile = new FileDialog(new Frame(), "Save File", FileDialog.SAVE);
                    savefile.setVisible(true);
                    final String fullpath = savefile.getDirectory() + savefile.getFile();
                    File sfi = new File(fullpath);

				// Now write to the file
                    try {
                        PrintWriter output;
                        output = new PrintWriter(new FileWriter(sfi));
                        output.println(content.getText());
                        output.close();
                        bu = true;

                    } catch (IOException ex) {
                        Logger.getLogger(HomeWork6.class.getName()).log(Level.SEVERE, null, ex);
                    }

                }

            }
        }

    }
}
