 
package exam;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.io.PrintWriter;

interface PropertyType {
    static final int HOUSE = 0;
    static final int APARTAMENT = 1;
    static final int COUNTRY_HOUSE = 2;
}
 
abstract class Property_To_Rent implements PropertyType {
    private int property_type;
    private String address;
    private int months;
    private int floorage;
    
    Property_To_Rent() {
        this.property_type = 0;
        this.address = null;
        this.months = 0;
        this.floorage = 0;
    }
    Property_To_Rent( int type, String address, int months, int floorage) {
        this.property_type = type;
        this.address = address;
        this.months = months;
        this.floorage = floorage;
    }
    public int getProperty_Type() {
        return this.property_type;
    }
    public String getAddress() {
        return address;
    }
    public int getMonths() {
        return months;
    }
    public int getFloorage() {
        return floorage;
    }
    abstract public void printData(PrintWriter pw);
    abstract public double getRent();
}




class House extends Property_To_Rent {
    private double rent_m2;
    final private double rent_coef = 1.2;
    public House() {
        super();
        rent_m2 = 0.;
    }
    public House(int type, String address, int months, int floorage,double rent ){
        super(type, address,  months,  floorage);
        this.rent_m2 = rent;
    }
    
    @Override
    public void printData(PrintWriter pw) {
        pw = new PrintWriter(System.out);
        pw.write("type: "+getProperty_Type() + "address " + getAddress() + "rent per month: " + rent_m2 + "rent coef: " + rent_coef );
        
    }
    @Override
    public double getRent() {
        return getMonths()*getFloorage()*rent_m2*rent_coef;
    }
}
    class Apartament extends Property_To_Rent {
    private double rent_m2;
    final private int rent_coef = 1;
    public Apartament() {
        super();
        rent_m2 = 0.;
    }
    public Apartament(int type, String address, int months, int floorage,double rent ){
        super(type, address,  months,  floorage);
        this.rent_m2 = rent;
    }
    
    @Override
    public void printData(PrintWriter pw) {
        pw = new PrintWriter(System.out);
        pw.write("type: "+getProperty_Type() + "address " + getAddress() + "rent per month: " + rent_m2 + "rent coef: " + rent_coef );
        
    }
    @Override
    public double getRent() {
        return getMonths()*getFloorage()*rent_m2*rent_coef;
    }
   }
    
    class Country_House extends Property_To_Rent {
    private double rent_m2;
    final private double rent_coef = 0.8;
    public Country_House() {
        super();
        rent_m2 = 0.;
    }
    public Country_House(int type, String address, int months, int floorage,double rent ){
        super(type, address,  months,  floorage);
        this.rent_m2 = rent;
    }
    
    @Override
    public void printData(PrintWriter pw) {
        pw = new PrintWriter(System.out);
        pw.write("type: "+getProperty_Type() + "address " + getAddress() + "rent per month: " + rent_m2 + "rent coef: " + rent_coef );
        
    }
    @Override
    public double getRent() {
        return getMonths()*getFloorage()*rent_m2*rent_coef;
    }
  }
    class Assets {
        private Property_To_Rent[] PropertyList;
        private int propertyCount;
        static int itr = 0;  // za proverka na zapalvane na masiva PropertyList
        public Assets() {
            PropertyList = new Property_To_Rent[20];
            propertyCount = 20;            
        }
        public Assets(int propCount) {
            this.propertyCount = 20;
            PropertyList = new Property_To_Rent[propertyCount];
        }  
        public void addPoperty(Property_To_Rent prop) throws MyException {
                if(itr < propertyCount) this.PropertyList[itr++] = prop;   
                else throw new MyException();
        }
            public void printList(PrintWriter pw) throws FileNotFoundException, IOException {
                
                for(int i=0;i<itr; i++)
                      PropertyList[i].printData(pw) ;  
               
        }
        
        public double maxRent() {
            double max = PropertyList[0].getRent();
            for(int i=1 ;i<itr; i++) {
                
                if(max < PropertyList[i].getRent())                
                    max = PropertyList[i].getRent();
            }
                
             return max;
        }
        
        public double SumOfRents() {
            double sum =0;
            for(int i=0;i<itr;i++)
                sum += PropertyList[i].getRent();
            
            return sum;
        }

    
}

class MyException extends Exception {
    public MyException() {
        super("ListFullException");
    }
}

public class Exam {

     
    public static void main(String[] args) throws MyException, FileNotFoundException, IOException {         //int type, String address, int months, int floorage
        
        Assets asset = new Assets(3);
        House house = new House(0,"maldost",5,60,20);
        Apartament apart = new Apartament(1,"Drujba",6,50,10);
        Country_House c_house = new Country_House(2,"Malina", 4, 100, 8);
        try {
            asset.addPoperty(house);
            asset.addPoperty(apart);
            asset.addPoperty(c_house);            
        }
        catch(MyException e){}   
        PrintWriter pw = new PrintWriter(new FileWriter("property.txt",true));
        asset.printList(pw);
        PrintWriter pw1 = new PrintWriter(System.out);//(new FileWriter("property.txt",true));
        File in = new File("property.txt");
        FileReader fr = new FileReader(in);
        System.out.println(fr.read());
        System.out.println("max rent: " + asset.maxRent());
        System.out.println("sum of rents: " + asset.SumOfRents());
        
        
       
    }
}
