
package Person;


public class PersonData {
    public int age;
    public String name;
    
    //konstruktor kogato nqma nikakvi zadadeni parametri 
    public PersonData () {   
    }
    public PersonData (int age){
        this.age = age; // this - tursi chlenovete na klasa
    }
    public PersonData (String name){
        this.name= name;
    }
    public PersonData (int age, String name) {
        this.name = name;
        this.age = age;
    }
}
