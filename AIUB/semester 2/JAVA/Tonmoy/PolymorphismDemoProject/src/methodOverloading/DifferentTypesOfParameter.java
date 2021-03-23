package methodOverloading;

public class DifferentTypesOfParameter {
    DifferentTypesOfParameter(){}
    public void disp(char c){
        System.out.println("value of disp(char c) method = "+c);
    }
    public void disp(int i){
        System.out.println("value of  disp(int i) method = "+i);
    }
    public void disp(boolean bo){
        System.out.println("value of  disp(boolean bo) method = "+bo);
    }
    public void disp(double d){
        System.out.println("value of  disp(double d) method = "+d);
    }
    public void disp(float f){
        System.out.println("value of  disp(float f) method = "+f);
    }
    public void disp(String mgs){
        System.out.println("value of disp(String mgs) method = "+mgs);
    }
}
