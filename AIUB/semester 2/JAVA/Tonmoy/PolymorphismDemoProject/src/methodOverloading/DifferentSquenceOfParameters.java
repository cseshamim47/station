package methodOverloading;

public class DifferentSquenceOfParameters {
    void method(int age,String name){
        System.out.println("I’m the first definition of method dispid= "+ age+" name = "+name);
    }
    void method(String name, int age){
        System.out.println("I’m the second definition of method dispname= "+name +" id = "+age);
    }
}
