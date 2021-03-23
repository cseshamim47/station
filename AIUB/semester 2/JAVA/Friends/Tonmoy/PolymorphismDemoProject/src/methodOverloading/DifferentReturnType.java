package methodOverloading;

public class DifferentReturnType {
    int add(int a,int b){
        return a+b;
    }
    double add(double a,double b,double c){
        return a+b+c;
    }
    float add(float a,float b){
        return a+b;
    }
    void add(){
        System.out.println("The sum of (add(5, 5)) + add(5.0,5.0, 5.0) +add(5.0f, 5.f) is : "+
                + add(5,5)+add(5.0,5.0, 5.0) +add(5.0f, 5.f));
    }

}
