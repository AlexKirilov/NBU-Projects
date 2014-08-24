/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package first;

/**
 *
 * @author Axel
 */
public class First {
    
    
    /**
     * @param args the command line arguments
     */
//void - oznachava nqma return
//public vaji za vsi4ki klasove
//private 6te vaji samo za clasa v koito/ za koito e napisan
    public static void main(String[] args) {
      int ime = 2;
        System.out.println(ime);    // printira promenlivata otbelqzana s v skobite
        System.out.println ("guz"); // printira markiranoto v skobite
    
    int a = 2;
    if (a==1){
        System.out.println ("vqrno");
    }else{
        System.out.println  ("greshno");
    }
    
    switch(a){
        case 2:
            System.out.println ("111"); break;
        case 3:
            System.out.println ("2222"); break;
        case 4:
            System.out.println ("sfss"); break;
        default: System.out.println ("krai");
    }
    while (a<=3) {
        System.out.println (a++);
    }
    do{
        System.out.println(a++);
    }while (a<=5);
        for (int b = 1; b <= 5; b++) {
            System.out.println (b++);
        }
        //Masivi
        int [] masiv = new int[2];
        masiv[0] = 40;
        masiv[1] = 30;
        System.out.println (masiv[0]);
        //Dvumeren masiv
        int [][] massiv = {
            {234,5,54},
            {56,7568,85},
            {234,63,76}
        };
        System.out.println (massiv[1][1]);
        
        for (int i = 0; i< massiv.length; i++)
        {
            for (int j = 0; j < massiv[i].length; j++){
                System.out.println(massiv[i][j]);
            }
            System.out.println();
        }
        //Obekti
       // dve obekt1 = new dve (45);
       // dve obekt2 = new dve (30);
       // dve obekt3 = new dve (30, 45);
        dve obekt1 = new dve();
        obekt1.vyrni();
       // obekt2.vyrni();
       // obekt3.vyrni();
        
  }
}
