import java.lang.*;

 

public class Calculator{
    public double num1;
    public double num2;
    Calculator(){}
    Calculator(double n1, double n2){
        num1 = n1;
        num2 = n2;
    }
    double add(){
        return num1+num2;
    }
    
    void display(){
        System.out.println(add());
    }
    public static void main(String[] args){
        Calculator empty = new Calculator();
        Calculator calc = new Calculator(10.5,20.5);
        //System.out.println(calc.add(10.5,11.5));
        calc.display();
    }
}