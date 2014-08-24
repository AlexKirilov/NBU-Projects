/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package f65063_alexandar_kirilov;

//<Aleksandar><Kirilov><f65063>

import java.io.File;
import java.io.IOException;
import java.io.PrintWriter;

//Variant 2

/**
 *
 * @author Student
 */
public class F65063_Alexandar_Kirilov {

    /**
     * @param args the command line arguments
     */
   public interface Automobile {
        int CAR = 0;
        int TRUCK = 1;
        int BUS = 2;   
    }
   
   public abstract class Rent_A_Car implements Automobile  {
       
     //private String type;
     private String brand;   //Marka na avtomobila
     private int days;       //Broi dni za naeta kola
     private int run;
     
     //Defoult construktor s nulevi stoinosti
     public Rent_A_Car () {
         brand  = null;
         days = 0;
         run = 0;
     }
     
     //Inicializirasht construktor
     public Rent_A_Car ( String Marka, int Day, int KM) {
          this.brand = Marka;
          this.days = Day;
          this.run = KM;
      }
     
     public String getBrand () {
         return this.brand;
     }
      
      public int getDays () {
          return days;
      }
      public int getRun () {
          return run;
      }
      
      public void printData () {
          System.out.printf("%n Marka:  %s%n Dni:  %d%n Izminati Kilometri + %d%n", brand, days, run);
      }
      
      public int getRent () {
          System.out.print ("Razhodite po naema na kolata sa na stoinost: ");
         return days + run;
      }
      
   }

    public static void main(String[] args, String filename) {
        // TODO code application logic here
        
       // Rent_a_Car
                
                
                
                
                
                
                
                
        try {
        File file = new File (autos.txt);
            if(!file.exists()) file.createNewFile();        
                       
         PrintWriter pw = new PrintWriter(autos.txt);
         pw.println(this.brand + "\t" + this.day + "\t" + this.run + "\t" + this.day_rate + "\t" + this.run_rate);
         pw.flush();
         pw.close();   
                       
                } catch( IOException e) {

    }
    
        
}
}
