package SetGet;

//package SetGet;
public class Teacher extends User{

    
    public void showInfo(){
        System.out.println("Teacher Name : "+getName());
        System.out.println("Teacher ID : "+getTid());
        System.out.println("Teacher Age : "+getAge());
        System.out.println("Teacher Designation : "+getDesignation());
        System.out.println();
    }
}
