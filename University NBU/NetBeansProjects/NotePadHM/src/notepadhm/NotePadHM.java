package notepadhm;

import java.awt.*;
import java.awt.datatransfer.Clipboard;
import java.awt.datatransfer.DataFlavor;
import java.awt.datatransfer.StringSelection;
import java.awt.datatransfer.Transferable;
import java.awt.event.*;
import java.io.*;
import static java.awt.image.ImageObserver.WIDTH;


/** * * @author Alex Kirilov Kirilo NBU F65063 */
public class NotePadHM extends Frame implements ActionListener {

    MenuBar menu;
    Menu file, edit, help;
    MenuItem mFNew, mFOpen, mFSave, mFExit;
    MenuItem mECopy, mEPaste, mECut, mEClear;
    CheckboxMenuItem mEBold, mEItalic;
    MenuItem mHAbout;
    final TextArea TextPad = new TextArea ("");
    String replaced = null;
    //TextArea TextPad;
    
    FileDialog fd1;
    Label lab1;
    
    public NotePadHM () {
        //Adding MenuBar
        menu = new MenuBar ();
        setMenuBar (menu);
        
            //Adding Menu - File
            file = new Menu ("File", true);
            menu.add(file);
                // Menu Items - File
                mFNew = new MenuItem  ("New",  new MenuShortcut (KeyEvent.VK_N));
                file.add(mFNew);
                mFOpen = new MenuItem ("Open", new MenuShortcut (KeyEvent.VK_O));
                file.add(mFOpen);
                mFSave = new MenuItem ("Save", new MenuShortcut (KeyEvent.VK_S));
                file.add(mFSave);
                file.addSeparator();
                mFExit = new MenuItem ("Exit", new MenuShortcut (KeyEvent.VK_Q));
                file.add(mFExit);

            //Adding Menu - Edit
            edit = new Menu ("Edit", true);
            menu.add(edit);
                //Menu Items - Edit
                mECopy = new MenuItem ("Copy",   new MenuShortcut (KeyEvent.VK_C));
                edit.add(mECopy);
                mEPaste = new MenuItem ("Paste", new MenuShortcut (KeyEvent.VK_V));
                edit.add(mEPaste);
                mECut = new MenuItem ("Cut",     new MenuShortcut (KeyEvent.VK_X));
                edit.add(mECut);
                mEClear = new MenuItem ("Clear");
                edit.add(mEClear);
                mEBold = new CheckboxMenuItem ("Bold", false);
                edit.add(mEBold);
                mEItalic = new CheckboxMenuItem ("Italic", false);
                edit.add(mEItalic);

            //Adding Menu - Help
            help = new Menu ("Help", true);
            menu.add(help);
                //Menu Item - Help - About
                mHAbout = new MenuItem ("About",  new MenuShortcut (KeyEvent.VK_H));
                help.add(mHAbout);

       //TextArea TextPad;*/
            fd1 = new FileDialog(this, "Select File to Open");
         
        add(TextPad);
        //add(fd1, BorderLayout.SOUTH);

        //Functions
        
        //Function New - will clan the TextArea
       mFNew.addActionListener(new ActionListener () {
            @Override
            public void actionPerformed (ActionEvent e) {
               TextPad.replaceRange("", WIDTH, WIDTH); 
            }
        });
        
        //Function Open - will Open outside Text files
        mFOpen.addActionListener (new ActionListener () {
        @Override
             public void actionPerformed (ActionEvent e) {
                fd1.setVisible(true);
                lab1.setText("Directory: " + fd1.getDirectory());
                display(fd1.getDirectory() + fd1.getFile());
             }

            private void display(String fname) {
                try {
                    FileInputStream fis1 = new FileInputStream(fname);
                    int fileSize = fis1.available();
                    byte buf1[] = new byte[fileSize];
                    fis1.read(buf1);
                    String str1 = new String (buf1);
                    TextPad.setText(str1);
                }
                catch (IOException e) {
                    System.exit(0);
                }
            }
         });
        
        //Function Save - will save the Text file to ...
        mFSave.addActionListener (new ActionListener () {
            @Override
            public void actionPerformed (ActionEvent e) {

/*                if (content.getText().length() < 5) {
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
                        output.println(content.getText());
                        output.close();
                    } catch (IOException ex) {
                        Logger.getLogger(NotePadHM.class.getName()).log(Level.SEVERE, null, ex);
                    }
                }*/
                
                {
                    FileDialog fileDialog = new FileDialog(new Frame(), "Save", FileDialog.SAVE);
                    fileDialog.setFilenameFilter(new FilenameFilter() {
                        @Override
                        public boolean accept(File dir, String name) {
                            return name.endsWith(".txt");
                        }
                    });
                    fileDialog.setFile("Untitled.txt");
                    fileDialog.setVisible(true);
                    System.out.println("File: " + fileDialog.getFile());
                }
            }
        });
        
        //Function Exit - will exit the program and ask for save if not allready
        mFExit.addActionListener (new ActionListener () {
            @Override
            public void actionPerformed (ActionEvent e) {
                
            }
        });
        
        //Windows Listener for Closing X Button andask for save
        addWindowListener(new WindowAdapter() {
            @Override
            public void windowClosing(WindowEvent we) {
                //if (mFExit) dialog - da ne i togava exit program
                System.exit(0);
            }
        });
        mFNew.addActionListener     (this);
        mECopy.addActionListener    (this);
        mEPaste.addActionListener   (this);
        mECut.addActionListener     (this);
        mEClear.addActionListener   (this);
        
        
        CheckboxMenuItem mEBold, mEItalic;
        MenuItem mHAbout;
        
        
        
        
    
        
        pack();
        setLocationRelativeTo(null);
        setSize (600,400);
        setTitle ("Notepad +");
        setVisible (true);
    }
    
    public static void main(String[] args) {
        NotePadHM notePadHM = new NotePadHM ();
    }

    @Override
    public void actionPerformed(ActionEvent ae) {
        
        //Copira selectiraniq text v Bufferat replaced
        if (ae.getSource().equals(mECopy)){
            replaced = TextPad.getSelectedText();
        }
        //Copira i izchistva poleto TextArea-ta
        if (ae.getSource().equals(mECut)) {
             String s = TextPad.getText();                    
             StringSelection ss = new StringSelection(s);    
              this.getToolkit().getSystemClipboard().setContents(ss, ss); 
            replaced = TextPad.getSelectedText();
          
        }
        //Vzema text-a ot buffera "replaced" i go vmukva v teksta
        if (ae.getSource().equals(mEPaste)) {
                    // Get the clipboard  
             Clipboard c = this.getToolkit().getSystemClipboard();  
             // Get the contents of the clipboard, as a Transferable object  
             Transferable t = c.getContents(this);  
             // Ask for the transferable data in string form, using the predefined  
             // string DataFlavor.  Then display that string in the field.  
             try {   
               String s = (String) t.getTransferData(DataFlavor.stringFlavor);  
               TextPad.setText(s);   
             }  
    // If anything goes wrong with the transfer, just beep and do nothing.  
    catch (Exception e) {   
      this.getToolkit().beep();  
      return;  
    }  
            
            /* */
        }
        //Izchistva markiraniq tekst - premahva go
        if (ae.getSource().equals(mEClear)) {
            TextPad.replaceRange( "", WIDTH, WIDTH); 
            TextPad.repaint();  
        }
        //
        if (ae.getSource().equals(mFNew)) {
            TextPad.replaceRange( "", WIDTH, WIDTH);
            TextPad.repaint();  
        }
    }
}
