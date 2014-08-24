/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package notepadhm6;

import java.awt.*;
import java.awt.event.*;
import java.io.*;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Alexander Kirilov F65053
 */
public class NotePadHM6 extends Frame {
    //Elementi
 MenuBar menu; 
    Menu file, edit, help;
    MenuItem mFNew, mFOpen, mFSave, mFExit;   //MenuItem for File Menu
    MenuItem mECopy, mEPaste, mECut, mEClear; // MenuItems for Edit Menu
    CheckboxMenuItem mEBold, mEItalic; //CheckBox for Edit Menu
    MenuItem mHAbout; // MenuItem for Help Menu;
    TextArea TextPad = new TextArea ("");
    String replaced = null; // For selected text;
    String str = TextPad.getText();
    Boolean bool = false;
    Panel screen1 = new Panel ();
    
    //For Dialog Window - Save - Open
    FileDialog fd1;
    Label lab1;
    
    public NotePadHM6 () 
    {
    //Adding Menu Bar
    menu = new MenuBar ();
    setMenuBar (menu);
    
    //Adding Menu - File
    file = new Menu ("File", true);
    menu.add(file);
        //Menu Item - File
        mFNew  = new MenuItem ("New",  new MenuShortcut (KeyEvent.VK_N));
        mFOpen = new MenuItem ("Open", new MenuShortcut (KeyEvent.VK_O));
        mFSave = new MenuItem ("Save", new MenuShortcut (KeyEvent.VK_S));
        mFExit = new MenuItem ("Exit", new MenuShortcut (KeyEvent.VK_Q));
        
        mFNew.addActionListener  (new MenuListener ());
        mFOpen.addActionListener (new MenuListener ());
        mFSave.addActionListener (new MenuListener ());
        mFExit.addActionListener (new MenuListener ());
        file.add(mFNew);
        file.add(mFOpen);
        file.add(mFSave);
        file.add(mFExit);
        
    //Adding Menu - Edit
    edit = new Menu ("Edit", true);
    menu.add(edit);
        //Menu Items - Edit
        mECut    = new MenuItem ("Cut", new MenuShortcut (KeyEvent.VK_X));
        mECopy   = new MenuItem ("Copy", new MenuShortcut (KeyEvent.VK_C));
        mEPaste  = new MenuItem ("Paste", new MenuShortcut (KeyEvent.VK_V));
        mEClear  = new MenuItem ("Clear");
        mEBold   = new CheckboxMenuItem ("Bold", false);
        mEItalic = new CheckboxMenuItem ("Italic", false);
        
        mECut.addActionListener    (new MenuListener ());
        mECopy.addActionListener   (new MenuListener ());
        mEPaste.addActionListener  (new MenuListener ());
        mEClear.addActionListener  (new MenuListener ());
        mEBold.addActionListener   (new MenuListener ());
        mEItalic.addActionListener (new MenuListener ());
        
        edit.add(mECut);
        edit.add(mECopy);
        edit.add(mEPaste);
        edit.add(mEClear);
        edit.add(mEBold);
        edit.add(mEItalic);
        
    //Adding Menu - About
    help = new Menu ("Help", true);
    menu.add(help);
        //Adding Menu Item - Help
        mHAbout = new MenuItem ("About", new MenuShortcut (KeyEvent.VK_H));
        help.add(mHAbout);
        
    //Adding TextArea
    add(TextPad);
    
        addWindowListener ( new WindowAdapter (){
        public void windowClosing (WindowEvent we){
            System.exit(0);
            
        }
    });
    
    pack();
    setLocationRelativeTo(null);
    setSize (600,400);
    setTitle ("Notepad +");
    setVisible (true);
    

    }
    
    public static void main(String[] args) {
        NotePadHM6 notepad = new NotePadHM6 ();
    }
    
        /***************Functions*******************/
    
    // Exit, Close Button, New , Clear
   class MenuListener implements ActionListener {
    //mFExit.addActionListener ( new ActionListener (){
        @SuppressWarnings("null")
        @Override
        public void actionPerformed (ActionEvent ae) {
            MenuItem menuitem = (MenuItem) ae.getSource();
        
        if (menuitem.equals(mFExit)){
            if (TextPad.getText().length() > 1 && bool == false) {
                    final Dialog dia = new Dialog(new Frame(), "Save ?", true);
                    Button yes = new Button("Yes");
                    Button no = new Button("No");
                    yes.addActionListener((ActionEvent e) -> {
                        dia.setVisible(false);
                        ActionEvent ae1 = new ActionEvent((MenuItem)mFSave, ActionEvent.ACTION_PERFORMED, "");
                        Toolkit.getDefaultToolkit().getSystemEventQueue().postEvent(ae1);
                    });
                    no.addActionListener((ActionEvent e) -> {
                        System.exit(0);
                    });
                    
                    dia.add("South", no);
                    dia.add("North", yes);
                    dia.pack();
                    Dimension dd = dia.getSize();
                    Dimension pd = TextPad.getParent().getSize();
                    Point pl = TextPad.getParent().getLocation();
                    dia.setLocation(
                            pl.x + ((int) (pd.getWidth() - dd.getWidth())) / 2,
                            pl.y + ((int) (pd.getHeight() - dd.getHeight())) / 2
                    );
                    dia.setVisible(true);
                    bool = true;

                } else {
                    System.exit(0);
                }
        }
        
    //mFNew.addActionListener( new ActionListener (){
        if (menuitem.equals(mFNew)){
            TextPad.setText ("");
                    
        }
    //mEClear.addActionListener ( new ActionListener () {
        if (menuitem.equals (mEClear)){
           TextPad.removeTextListener((TextListener) ae);
        }
    
    //mFOpen.addActionListener (new ActionListener () {
        if (menuitem.equals(mFOpen)){
             FileDialog dialo = new FileDialog(new Frame(), "Open");
                dialo.setFile("*.txt");
                dialo.setVisible(true);
                String sour = dialo.getDirectory() + dialo.getFile();

                try {
                    FileReader rea = new FileReader(sour);
                    char[] buff = new char[4096];
                    int len;
                    TextPad.setText(" ");
                    while ((len = rea.read(buff)) != -1) {
                        String s = new String(buff, 0, len);
                        TextPad.setText(s);
                    }
                    if (rea != null) {
                        rea.close();
                    }
                } catch (FileNotFoundException ex) {
                    Logger.getLogger(NotePadHM6.class.getName()).log(Level.SEVERE, null, ex);
                } catch (IOException ex) {
                    Logger.getLogger(NotePadHM6.class.getName()).log(Level.SEVERE, null, ex);
                }
        }
    
    
    //mFSave.addActionListener (new ActionListener () {
        if (menuitem.equals(mFSave)) {
            if (TextPad.getText().length() < 5) {

                    final Dialog di = new Dialog(new Frame(), "Nqma Informaciq koqto da bude zapazena", true);
                    // true for modal
                    di.add("Center", new Label("Empty File"));
                    di.setSize(300,200);
                    di.setLocationRelativeTo(null);
                    Button ok = new Button("Continue");
                    ok.addActionListener((ActionEvent e) -> {
                        di.setVisible(false);
                        
                    });
                    di.add("South", ok);
                    di.pack();
                    di.setVisible(true);
                    di.setLocationRelativeTo(null);
                    

            } else {

                    mFSave.setEnabled(true);
                    FileDialog savefile = new FileDialog(new Frame(), "Save File", FileDialog.SAVE);
                    savefile.setVisible(true);
                    final String fullpath = savefile.getDirectory() + savefile.getFile();
                    File sfi = new File(fullpath);

				// Now write to the file
                    try {
                        PrintWriter output;
                        output = new PrintWriter(new FileWriter(sfi));
                        output.println(TextPad.getText());
                        output.close();
                        bool = true;

                    } catch (IOException ex) {
                        Logger.getLogger(NotePadHM6.class.getName()).log(Level.SEVERE, null, ex);
}
          }
        }
    
    
    //Functions - Cope, Cut , Paste
    //mECopy.addActionListener (new ActionListener () {
        if (menuitem.equals (mECopy)) {
            replaced = TextPad.getSelectedText();
        }
       
    //mECut.addActionListener (new ActionListener () {
        if (menuitem.equals (mECut)) {
            //replaced = TextPad.getSelectedText();
           // TextPad.removeTextListener((TextListener) ae);
            if(TextPad.getSelectedText().length() != 0){
            }
                    replaced = TextPad.getSelectedText();
                    str = TextPad.getText();
                    int i = TextPad.getSelectionStart();
                    int p = TextPad.getSelectionEnd();
                    TextPad.setText(str.replace(replaced, ""));
        }
    
    //mEPaste.addActionListener (new ActionListener () {
        if (menuitem.equals(mEPaste)){
            Integer start = TextPad.getSelectionStart();
                TextPad.insert(replaced, start);          
        }
        
    
    }
  }
}


