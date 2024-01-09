public class A{

    static int age; // 0

    A(){
        System.out.println("A");
    }
    A(int age){
        this.age = age;
        System.out.println("Age: " + age);
    }

    A(int age,int id){
        this.age = age;
        System.out.println("Age: " + age);
        System.out.println(id);
    }


}
