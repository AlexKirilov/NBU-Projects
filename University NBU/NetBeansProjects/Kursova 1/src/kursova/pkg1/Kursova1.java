/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package kursova.pkg1;
//Zadanie Variant 2
/* 1. Да се състави интерфайс Automobile, съдържащ целочислени кодове на типовете автомобили (5точки)
    -CAR -  с код 0;
    -TRUCK - с код 1;
    -BUS - с код 2;
   2. Да се състави абстрактен базов клас "автомобил под наем" (Rent_A_Car), съдържащ (15 точки)
    - код на типа на автомобила (type) - съгласно стойностите от интерфайса Automobile.
    - Марка на автомобила (brand) - символен низ.
    - брой на дните, в който е нает автомобила (days);
    - пробег на автомобила (run);
    Публични:
    - Конструктор без параметри  - инициализира стойностите на числовите частни полета с 0, а низовете с null;
    - конструктор с параметри за инициализиране на стойностите на частните полета;
    - методи get_() за достъп до частните полета.
    - абстрактният метод printData()  - за извеждане на информацията за автомобила.
    - абстрактният метод getRent()  - за пресмятане и получаване на наема от автомобила.
   3. Класа Car,Truck, и Bus наследници на класа Rent_A_Car, съдържащ: (20 точки)
    Частни полета:
     - тарифа за наема - (day_rate).
     - тарифа за един км пробег (run_rate).
    Публични полета:
     - конструктор без параметри - инициализира day_rate и run_rate с 0.
     - конструктор с параметри, инициализиращ day_rate и run_rate и наследените частни полета.
     - метод printData(PrintWriter pw) - извеждащ в потока pw марка, тип на автомобила, day_rate i run_rate.
     - метод getRent() - връщащ приходите от наема на автомобила, изчислен по формулата:
          days*day_rate - run*run_rate.
   4. Да се състави клас AutoFleet, съдържащ (30 точки).
    Частни полета:
     - масив autoList [] - съдържащ списък от автомобили (до 20 елемента).
     - променлива autoCount - текущ брой на елементите в autoList. 
    Публични полета:
     - конструктор без параметри - инициализира autoList  с 20 елемена.
     - конструктор с параметри, "брой на елементите в масива" - създава масив с указаната в параметъра дължина.
     - метод addRent_A_Car (Rent_A_Car car) -  за добавяне на автомобил в списъка  - увеличава autoCount и генерира собствено изключение ListFullExpection,  ако списъкът е пълен.
     - извеждане на списъка във файл  - printList (PrintWriter pw).
     - намиране на автомобила с максимален приход - maxRent (); 
     - сумиране на приходите от наемите в списъка - sumOfRanets ();
  5. Да се състави тестов клас с метод main () , в който да бъде направено следното: (10 точки)
     - да се инициализира списъкът на автомобилите с не повече от 5 елемента.
     - да се създадат и добавят автомобили от трите различни категории (използвайте конструкторите)
     - да се изведе списъкът в текстов файл "auto.txt". 
     - да се изведе списъкът в стандартният изходен поток  System.out.
     - да се отпечатат данните за автомобила с максимален приход.
     - да се отпечата сумата от наемите  на автомобилите в списъка.
     */
/**
 *
 * @author Axel
 */
    import java.io.File;
    import java.io.IOException;
    import java.io.PrintWriter;
    import java.util.*;
    


    /**
     * @param args the command line arguments
     */
    
     interface Automobile {
        
        int CAR     = 0;
        int TRUCK   = 1;
        int BUS     = 2;
    }
    
     abstract class Rent_A_Car implements Automobile  {
        private int type; //= implements (Automobile); //       Kak se pravi to4no bahhhh
        private String brand;   // Марка на автомобила.
        private int days;       //Брoй дни за наемане на автомобил.
        private int run;        //За пробег на автомобила.
        
        public Rent_A_Car () {
            this.type = 0;
            this.brand = null;
            this.days = 0;
            this.run = 0;
        }
        public Rent_A_Car (int type, String Marka, int Days, int KM) {
            this.type = type;
            this.brand = Marka;
            this.days  = Days;
            this.run   = KM;
        }
        public String get_Brand ()   { return this.brand; }
        public int get_Days ()       { return this.days; }
        public int get_Run ()        { return this.run; }
        //абстрактният метод printData()  - за извеждане на информацията за автомобила.
        public abstract void printData ( PrintWriter pw );      
        
        //- абстрактният метод getRent()  - за пресмятане и получаване на наема от автомобила.
        public abstract  int getRent ();
    }
    //???????????????????????????????????????????????
    //Трябва ли и как да се имплементира Типа на наетото превозно средство от 
    //Automobile в случая CAR = 0 ; ?????????????????????????????????????????????????????????????????????????????
     class Car extends Rent_A_Car {
        private int day_rate;
        private int run_rate;
        
        public Car () {
            day_rate = 0;
            run_rate = 0;
        }
        public Car ( int type, String brand, int days, int run, int rDay, int rRun ) {
            super (type,brand, days, run );
            this.day_rate = rDay;
            this.run_rate = rRun;                 
        }
        //метод printData(PrintWriter pw) - извеждащ в потока pw марка, тип на автомобила, day_rate i run_rate.        
        @Override
        public void printData (PrintWriter pw) {
           
            pw.write("Информация за наетият автомобил" +"\nТип: " +CAR + "Марка: " +this.get_Brand() + "\nПериод на наетият автомобил: " + day_rate +  "\nИзминато разстояние: " + run_rate );  //  
            
        }
        @Override
        public int getRent  ()/*(int days, int run)*/
        { return this.get_Days() * day_rate - this.get_Run()* run_rate; }
        
    } //Край на class Car
    
     class Truck extends Rent_A_Car {
        private int day_rate;
        private int run_rate;
        
        public Truck () {
            day_rate = 0;
            run_rate = 0;
        }
        public Truck (int type, String brand, int days, int run, int rDay, int rRun ) {
            super (type, brand, days, run );
            this.day_rate = rDay;
            this.run_rate = rRun;                 
        }
        //метод printData(PrintWriter pw) - извеждащ в потока pw марка, тип на автомобила, day_rate i run_rate.        
        @Override
        public void printData (PrintWriter pw) {
          
            pw.write("Информация за наетият автомобил" +"\nТип: " + TRUCK + "Марка: " +this.get_Brand() + "\nПериод на наетият автомобил: " + day_rate +  "\nИзминато разстояние: " + run_rate );
        }
        @Override
        public int getRent  ()/*(int days, int run)*/
        { return this.get_Days() * day_rate - this.get_Run()* run_rate; }
        
    } // Krai na class Truck
    
     class Bus extends Rent_A_Car {
        private int day_rate;
        private int run_rate;
        
        public Bus () {
            day_rate = 0;
            run_rate = 0;
        }
        public Bus (int type, String brand, int days, int run, int rDay, int rRun ) {
            super (type, brand, days, run );
            this.day_rate = rDay;
            this.run_rate = rRun;                 
        }
        //метод printData(PrintWriter pw) - извеждащ в потока pw марка, тип на автомобила, day_rate i run_rate.        
        @Override
        public void printData (PrintWriter pw) {
         //   pw = new PrintWriter(System.out);
            pw.write("Информация за наетият автомобил" +"\nТип: " +BUS + "Марка: " +this.get_Brand() + "\nПериод на наетият автомобил: " + day_rate +  "\nИзминато разстояние: " + run_rate );    
        }
        @Override
        public int getRent  ()/*(int days, int run)*/
        { return this.get_Days() * day_rate - this.get_Run()* run_rate; }
        
    } // Krai na class Bus
    
    /**
     *
     */
    // Private int [] autoList  podleji na proverka za pravilno inicializirane
     class AutoFleet {
    //масив autoList [] - съдържащ списък от автомобили (до 20 елемента).
    //??????
        private Rent_A_Car [] autoList; 
        private int autoCount;
        static int count = 0;
        
        //конструктор без параметри - инициализира autoList  с 20 елемена.
         public AutoFleet () {
         this.autoList = new Rent_A_Car [20]; 
         this.autoCount = 20 ;
        }
        
        //????????????????????????????
        //конструктор без параметри - инициализира autoList  с 20 елемена.
        public AutoFleet ( int length ) {
              this.autoList = new Rent_A_Car [length]; 
              this.autoCount = length;
            
        }
        
        //метод addRent_A_Car (Rent_A_Car car) -  за добавяне на автомобил в списъка  - увеличава autoCount и генерира собствено изключение ListFullExpection,  ако списъкът е пълен.
        public void addRent_A_Car (Rent_A_Car car) {

                if (count < this.autoCount) 
                   this.autoList[count++] = car;
                    //System.out.println ("%nДостигнах те максималният брой за въвеждане на превозни средства.%n ");    
                else System.out.println("too many autos");
        }
         //Za printirane na celiqt spisuk;
        public void PrintList (PrintWriter pw) {
            for (int i=0; i<count; i++)
            autoList[i].printData(pw);
        }
       } 
           
        
        
        
     
    /*4. Да се състави клас AutoFleet, съдържащ (30 точки).
    Частни полета:
     - масив autoList [] - съдържащ списък от автомобили (до 20 елемента).
     - променлива autoCount - текущ брой на елементите в autoList. 
    Публични полета:
     - конструктор без параметри - инициализира autoList  с 20 елемена.
     - конструктор с параметри, "брой на елементите в масива" - създава масив с указаната в параметъра дължина.
     - метод addRent_A_Car (Rent_A_Car car) -  за добавяне на автомобил в списъка
     * - увеличава autoCount и генерира собствено изключение ListFullExpection, 
     * ако списъкът е пълен.
     
     - извеждане на списъка във файл  - printList (PrintWriter pw).
     - намиране на автомобила с максимален приход - maxRent (); 
     - сумиране на приходите от наемите в списъка - sumOfRanets ();
     
     
  5. Да се състави тестов клас с метод main () , в който да бъде направено следното: (10 точки)
     - да се инициализира списъкът на автомобилите с не повече от 5 елемента.
     - да се създадат и добавят автомобили от трите различни категории (използвайте конструкторите)
     - да се изведе списъкът в текстов файл "auto.txt". 
     - да се изведе списъкът в стандартният изходен поток  System.out.
     - да се отпечатат данните за автомобила с максимален приход.
     - да се отпечата сумата от наемите  на автомобилите в списъка.
     */
    public class Kursova1 {
    
    public static void main(String[] args) {
        
       AutoFleet fleet = new AutoFleet(3);
       Car car = new Car();
       Truck truck = new Truck ();
       Bus bus = new Bus ();
     
       fleet.addRent_A_Car(car);
       fleet.addRent_A_Car(truck);
       fleet.addRent_A_Car(bus);
       fleet.addRent_A_Car(car);
       fleet.addRent_A_Car(car);
       fleet.addRent_A_Car(car);
       PrintWriter pw = new PrintWriter(System.out);
       fleet.PrintList(pw);
       pw.close();
       
       
       
        
 
        
        
           File file = new File ("autos.txt");
                
                
           
            
        
    }
}
