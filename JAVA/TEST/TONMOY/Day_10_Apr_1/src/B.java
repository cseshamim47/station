public class B extends A{

    String name;
    int age;
    String gender;

    B(String name,int age,String gender)
    {
        this(name,age);
        System.out.println("con 1");
        this.gender = gender;
    }
    B(String name,int age)
    {
        this(name);
        this.age=age;
        System.out.println("con 2");
    }
    B(String name)
    {
        this.name=name;
        System.out.println("con 3");
    }




    public static void main(String[] args) {
        B objReference = new B("shamim",22,"Male");
    }

}
