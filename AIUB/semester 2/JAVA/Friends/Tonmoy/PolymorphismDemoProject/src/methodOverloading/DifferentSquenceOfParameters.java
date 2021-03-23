package methodOverloading;

public class DifferentSquenceOfParameters {

    DifferentSquenceOfParameters(){}

    DifferentSquenceOfParameters(int age,String name){
        System.out.println("Constructor 1 : I’m the first definition of method dispid= "+ age+" name = "+name);
    }
    DifferentSquenceOfParameters(String name, int age){
        System.out.println("Constructor 2 : I’m the second definition of method dispname= "+name +" id = "+age);
    }

    void method(int age,String name){
        System.out.println("I’m the first definition of method dispid= "+ age+" name = "+name);
    }
    void method(String name, int age){
        System.out.println("I’m the second definition of method dispname= "+name +" id = "+age);
    }
}
