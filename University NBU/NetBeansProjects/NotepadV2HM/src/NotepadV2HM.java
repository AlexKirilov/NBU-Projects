
import java.awt.*;
import java.awt.event.*;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Aleksandar Kirilov F65063
 */
public class NotepadV2HM extends Frame {
    MenuBar menu; 
    Menu file, edit, help;
    MenuItem mFNew, mFOpen, mFSave, mFExit;   //MenuItem for File Menu
    MenuItem mECopy, mEPaste, mECut, mEClear; // MenuItems for Edit Menu
    CheckboxMenuItem mEBold, mEItalic; //CheckBox for Edit Menu
    MenuItem mHAbout; // MenuItem for Help Menu;
    TextArea TextPad = new TextArea ("");
    String replaced = null; // For selected text;
    String str = TextPad.getText();
    Panel pan = new Panel();
    //For Dialog Window - Save - Open
    FileDialog fd1;
    Label lab1;
    Boolean bu = false;
    
    public NotepadV2HM ()    {
    
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
    
        mFOpen.addActionListener(new menuItemListener());
        mFExit.addActionListener(new menuItemListener());
        mECopy.addActionListener(new menuItemListener());
        mHAbout.addActionListener(new menuItemListener());
        mFNew.addActionListener(new menuItemListener());
        mECut.addActionListener(new menuItemListener());
        mEPaste.addActionListener(new menuItemListener());
        mEBold.addActionListener(new menuItemListener());
        mEItalic.addActionListener(new menuItemListener());
        mFSave.addActionListener(new menuItemListener());

    pack();
    setLocationRelativeTo(null);
    setSize (600,400);
    setTitle ("Notepad +");
    setVisible (true);
    
    /*
    **************Functions*******************/
    
    }
    
/**
     *
     * @param args
     */
    public static void main(String[] args) {
         NotepadV2HM Notepad = new NotepadV2HM ();
         Notepad.setVisible (true);
    }

class windowListener extends WindowAdapter {

        @Override
        public void windowClosing(WindowEvent we) {
            System.exit(0);
        }
    }

    class menuItemListener implements ActionListener {

        @Override
        public void actionPerformed(ActionEvent e) {

            MenuItem cmd = (MenuItem) e.getSource();

            if (cmd.equals(mFOpen)) {
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
                    Logger.getLogger(NotepadV2HM.class.getName()).log(Level.SEVERE, null, ex);
                } catch (IOException ex) {
                    Logger.getLogger(NotepadV2HM.class.getName()).log(Level.SEVERE, null, ex);
                }
            }
            
            if (cmd.equals(mFExit)) {

                if (TextPad.getText().length() > 2 && bu == false) {
                    final Dialog dia = new Dialog(new Frame(), "Sudarjanieto e promeneno ,da zapazq li promenite ?", true);
                    dia.add("Left", new Label("Zapazvane na promeni ?"));
                    Button yes = new Button("da");
                    Button no = new Button("ne");
                    yes.addActionListener(new ActionListener() {
                        public void actionPerformed(ActionEvent e) {
                            dia.setVisible(false);
                            ActionEvent ae = new ActionEvent((MenuItem)mFSave, ActionEvent.ACTION_PERFORMED, "");
                            Toolkit.getDefaultToolkit().getSystemEventQueue().postEvent(ae);

                        }
                    });
                    
                    no.addActionListener(new ActionListener(){
                        public void actionPerformed(ActionEvent e){
                        System.exit(0);
                        }
                    });
                    
                    dia.add("South", no);
                    dia.add("North", yes);
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
                } else if (cmd.equals(mFSave)) {

                if (TextPad.getText().length() < 5) {

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
                        bu = true;

                    } catch (IOException ex) {
                        Logger.getLogger(NotepadV2HM.class.getName()).log(Level.SEVERE, null, ex);
                    }

                }
            }
        
                
            if (cmd.equals(mFNew)) {

                TextPad.setText(" ");

            }
            
            if (cmd.equals(mECopy)) {
                if(TextPad.getSelectedText().length() != 0){ 
                replaced = TextPad.getSelectedText();
                
                }
            }
            
            if (cmd.equals(mHAbout)) {
                System.out.println("about");
                
            }
            
            if(cmd.equals(mEPaste)){ 
                Integer start = TextPad.getSelectionStart();
                TextPad.insert(replaced, start);
            
            }
            
            if (cmd.equals(mECut)) {
                if(TextPad.getSelectedText().length() != 0){
                    replaced = TextPad.getSelectedText();
                    str = TextPad.getText();
                    int i = TextPad.getSelectionStart();
                    int p = TextPad.getSelectionEnd();
                    TextPad.setText(str.replace(replaced, ""));
                }
            } 
        }
    }
}
