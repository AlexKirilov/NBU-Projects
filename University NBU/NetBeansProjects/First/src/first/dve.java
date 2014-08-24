/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package first;

/**
 *
 * @author Axel
 */
public class dve {
    private int i;
    public dve(int i) {
        this.i = i;
    }
    /*public dve (int a, int b){
        this.i=a+b;
    }*/
    public void setA(int a) {
        this.i = a;
    }
    public int getA() {
    return this.i;
}
    
    public  void vyrni () {
        setA(4);
        //System.out.println ("Vurnatiqt metod:" + i);
        System.out.println (getA());
    }
    
}
