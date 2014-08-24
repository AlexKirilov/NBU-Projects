/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package f65063_alexandar_kirilov;

import f65063_alexandar_kirilov.F65063_Alexandar_Kirilov.Rent_A_Car;
import java.io.PrintWriter;

/**
 *
 * @author Student
 */
public class Truck extends Rent_A_Car {
    private double day_rate;
    private double run_rate;
    
    public Truck () {
        day_rate = 0;
        run_rate = 0;
    }
    @Override
    public Truck ( double d_rate, double r_rate) {
        this.day_rate = d_rate;
        this.run_rate = r_rate;
        super (brand);
        super (days);
        super (run);
    }
    
    public void printData (PrintWriter pw) {
        System.out.printf ( "Marka:  %s%n Dnevna taksa: %d Taksa na izminat kilometar: %d", brand, day_rate, run_rate );
    }
    
    public double getRent () {     
        return  days*day_rate+run*run_rate;
    }
    
}
