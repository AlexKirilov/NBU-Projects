
import java.awt.*;
import java.awt.event.*;
import java.util.List;

/** *  * @author Alexksander Kirilov F65063 */
public class JavaApplication124 extends Frame {
    MenuBar menu;
    Menu file, edit, help;
    MenuItem mNew, mOpen, mSave,mExit; //Itemi za File menu
    MenuItem mCopy, mPaste, mCut, mAdd; // Itemi za edit menu
    MenuItem mAbout; //Itemi za help menu
    CheckboxMenuItem cbMenuItem;
    Panel p1;
    Button Button1 = new Button ("Add");
    TextArea TextArr; 
    List list1;
    Label freeSpace;
    CheckboxGroup cbg1;
    //Checkbox chRed, chGreen, chBlue;
    Checkbox chRed = new Checkbox("Red",false, cbg1);
    Checkbox chGreen = new Checkbox("Green",false, cbg1);
    Checkbox chBlue = new Checkbox("Blue",false, cbg1);
    public JavaApplication124 () {

            menu = new MenuBar();
            setMenuBar(menu);
            
            file = new Menu ("File", true);
            menu.add(file);
                mNew = new MenuItem ("New");
                file.add(mNew);
                mNew.disable();
                mOpen = new MenuItem ("Open");
                file.add(mOpen);
                mOpen.disable();
                mSave = new MenuItem ("Save");
                file.add(mSave);
                mSave.disable(); 
                file.addSeparator();
                mExit = new MenuItem ("Exit", new MenuShortcut (KeyEvent.VK_X));
                file.add("mExit");
            
            edit = new Menu ("Edit", true);
            menu.add(edit);
                mCopy = new MenuItem ("Copy");
                edit.add(mCopy);
                mCopy.disable();
                mPaste = new MenuItem ("Paste");
                edit.add(mPaste);
                mPaste.disable();
                mCut = new MenuItem ("Cut");
                edit.add(mCut);
                mAdd = new MenuItem ("Add");
                edit.add(mAdd);
                
             help = new Menu ("Help", true);
             menu.add(help);
                mAbout = new MenuItem ("About");
                help.add(mAbout);
                //help.setHelpMenu (mAbout);
                //Activ Dialog
                
            
            /*CheckboxGroup cbg1;
              Checkbox chRed, chGreen, chBlue;*/
              setLayout (new GridLayout (6,1));
              //p1.setLayout (new GridLayout ());
              add(freeSpace);
              add(chRed);
              add(chGreen);
              add(chBlue);
              add(freeSpace);
              add(Button1);
                
              setLayout (new GridLayout (1,2));
              add(TextArr, BorderLayout.CENTER);
              add((Component) list1);
              add(p1, BorderLayout.WEST);       

      Button1.addActionListener (new ActionListener(){
         
         @Override
         public void actionPerformed (ActionEvent e) {
              list1.add(TextArr.getSelectedText());
              TextArr.removeTextListener((TextListener) e);           
         } 
      });
      
      mCut.addActionListener(new ActionListener () {
         
          @Override
          public void actionPerformed (ActionEvent e) {
           TextArr.removeTextListener((TextListener) e);
           //list1.removeTextListener((TextListener) e);
          }
      });
      
      mAdd.addActionListener (new ActionListener () {
         
          @Override
          public void actionPerformed (ActionEvent e) {
              list1.add(TextArr.getSelectedText());
              TextArr.removeTextListener((TextListener) e);
          }
      });
      
      chRed.addItemListener(new ItemListener(){
          @Override
          public void itemStateChanged(ItemEvent e){
              setBackground(Color.RED);
          }
      });
      
      chGreen.addItemListener(new ItemListener(){
          @Override
          public void itemStateChanged(ItemEvent e){
              setBackground(Color.GREEN);
          }
      });
      
      chBlue.addItemListener(new ItemListener(){
          @Override
          public void itemStateChanged(ItemEvent e){
              setBackground(Color.BLUE);
          }
      });
      
      addWindowListener(new WindowAdapter() {
    
            @Override
            public void windowClosing(WindowEvent we) {
                System.exit(0);
            }
        });
      
    pack();
    setSize (600,500);
    setTitle ("Aleksander Kirilov Kirilov F65063");
    setVisible (true);
    }    
//    
//    class  CheckBoxGp implements ItemListener{
//        public void itemStateChanged(ItemEvent e){
//           Checkbox cbg1;
//            cbg1 = (Checkbox) e.getSource();
//            if (cbg1.equals(chRed))      {setBackground (Color.RED);}
//            if (cbg1.equals(chGreen))    {setBackground (Color.GREEN);}
//            if (cbg1.equals(chBlue))     {setBackground (Color.BLUE);}
//        }
//    }
//    }
    
    /**
     *
     * @param args
     */
    public static void main(String[] args) {
        JavaApplication124 JavaApplication1 = new JavaApplication124 (); 
    }
//
//    private static class CheckBoxGp {
//
//        public CheckBoxGp(ItemEvent e) {
//            Checkbox cbg1;
//            cbg1 = (Checkbox) e.getSource();
//            if (cbg1.equals(chRed))      {setBackground (Color.RED);}
//            if (cbg1.equals(chGreen))    {setBackground (Color.GREEN);}
//            if (cbg1.equals(chBlue))     {setBackground (Color.BLUE);}
//        
//        }
//    }  
}
