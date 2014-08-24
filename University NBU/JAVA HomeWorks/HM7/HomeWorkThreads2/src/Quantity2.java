import java.util.logging.Level;
import java.util.logging.Logger;
public class Quantity2 extends Thread {
    public int a ;
    //int p = 0;
    public boolean stop ;
    public int buk (int p){
        a = p;
        return a;
    }
    
    public void stoprequestbanani(){
        //currentThread().interrupt();
        stop = true;
        //return stop;
        System.out.println(stop+"Ëxitni mrusna marula");
    }
    
    
    
    public void run( ) {
        int i = 0;
         while(!stop){ 
            try {
                
                this.sleep(300);
                System.out.println("thread : " + i);
                i++;
                if(i == a){
                    this.stoprequestbanani();
                }
            } catch (InterruptedException ex) {
                Logger.getLogger(Quantity2.class.getName()).log(Level.SEVERE, null, ex);
            }
            
         }
    }
}