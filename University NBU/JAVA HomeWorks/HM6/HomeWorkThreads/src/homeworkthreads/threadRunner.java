/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package homeworkthreads;

import java.awt.Choice;
import java.awt.TextField;

 public class threadRunner implements Runnable {
        private threadRunner tr;
	private TextField field;
	private Choice step;
	private int i;
    
      //private final Thread t1, t2;
        //Integer x = Integer.valueOf(step1);
        //int x = Integer.parseInt(step1);
        //getSelectedItem(), getSelectedIndex()
              public threadRunner(threadRunner tr, int fieldN) {
                
                  
		this.tr = tr;
		
		if(fieldN == 1) {
			field = tr.tAThread1;
			step = tr.lStep;
		} else {
			field = tr.tAThread2;
			step = tr.rStep;
		}
	
                  //t1 = new Thread ();//Buttona startT1
                  //t2 = new Thread ();//Buttona startT2
    }

        //Startirane na nishkite i Subirane sus suotvetnata stupka
        public void run() {
//            if (runningthr1) {
//                result1 += Integer.parseInt(steps1.toString()); //steps1 e izbora na stupka ot List1
//            }
//            if (runningthr2) {
//                //result2 += Integer.parseInt(steps2); //steps2 e izbora na stupka ot List2  
//                result2 += Integer.parseInt(steps2.toString());;
//            }
//        }
//        public void stop () {
//            runningthr1 = false;
//            runningthr2 = false;
//        }
            while(i < 15000) {
			try {
				Thread.sleep(150);
			} catch (InterruptedException e) {
				e.printStackTrace();
			}
			if(step.getSelectedItem().equals("1")) {
				i += 1;
			}
			if(step.getSelectedItem().equals("2")) {
				i += 2;
			}
			if(step.getSelectedItem().equals("3")) {
				i += 3;
			}
                        if(step.getSelectedItem().equals("5")) {
				i += 5;
			}
                        if(step.getSelectedItem().equals("7")) {
				i += 7;
			}
                        if(step.getSelectedItem().equals("9")) {
				i += 9;
			}
			String result = String.valueOf(i);
			field.setText(result);
		}
    }

    void suspend() {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
}

   