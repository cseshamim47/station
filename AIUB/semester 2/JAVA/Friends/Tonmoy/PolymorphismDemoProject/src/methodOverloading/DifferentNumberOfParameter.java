package methodOverloading;

public class DifferentNumberOfParameter {
    void add(int a){
        System.out.println("value of  add(int a) method = "+(a+a));
    }
    void add(int a,int b){
        System.out.println("value of  add(int a,b) method = "+(a+b));
    }
    void add(int a,int b,int c){
        System.out.println("value of  add(int a,b,c) method = "+(a+b+c));
    }
    void add(int a,int b,int c,int d){
        System.out.println("value of  add(int a, int b, int c, int d) method = "+(a+b+c+d));
    }
    void add(int a,int b,int c,int d,int e){
        System.out.println("value of  add(int a,int b,int c,int d, int e) method = "+(a+b+c+d+e));
    }
}
