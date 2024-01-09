
class A{
    public void print()
    {
        System.out.println("Class A");
    }
}
class B extends A{
    public void print()
    {
        System.out.println("Class B");
    }
}

public class MainClass {

    public static void main(String[] args) {
        A obj = new A();
        obj.print();
        obj = new B();
        obj.print();
    }
}
