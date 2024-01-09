import java.util.HashSet;
import java.util.Set;
import java.util.function.Function;



public class Main {




    private final int x = 10;

    public void display(){
        class Inner{
            void print(int x){
                System.out.println("x = "+ this.x);
            }
        }
        Inner obj = new Inner();
        obj.print(20);
    }

    public static void main(String[] args) {
        Main m = new Main();
        m.display();
//        int x = 5;
//        Integer y = x; /// Auto Boxing
//
//        y += 100;
//
//        int z = y; /// Auto Unboxing
//
//        System.out.println(y);
//        System.out.println(z);

    }
}