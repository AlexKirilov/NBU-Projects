
package klasove1;

import Person.*; //Vmukvame vsi4ki nali4ni clasove ot paketa Person

public class Klasove1 {

  
    public static void main(String[] args) {
        
       PersonData person1 = new PersonData(); // Neqven konstuktor 'Default'
       PersonData person2 = new PersonData(18);
       PersonData person3 = new PersonData("Blagoi");
       PersonData person4 = new PersonData(20, "Petkan");
       //person1.age = 20; // Tupiqt nachin na promqna na stoinostta na age;  
       //System.out.println (person1.age);
     
       System.out.println(person1.age);
       System.out.println(person1.name);
       System.out.println(person2.age);
       System.out.println(person2.name);
       System.out.println(person3.age);
       System.out.println(person3.name);
       System.out.println(person4.age);
       System.out.println(person4.name);
    }
}
