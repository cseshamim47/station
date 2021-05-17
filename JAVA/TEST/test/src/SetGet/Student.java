package SetGet;//package SetGet;

public class Student extends User{
    private int sid;
    private double CGPA;

    public void setSid(int sid){
        this.sid = sid;
    }

    public void setCGPA(double CGPA){
        this.CGPA = CGPA;
    }

    public int getSid(){
        return sid;
    }

    public double getCGPA(){
        return CGPA;
    }
    
    
    public void showInfo(){
        System.out.println("Student Name : "+getName());
        System.out.println("Student ID : "+getSid());
        System.out.println("Student Age : "+getAge());
        System.out.println("Student CGPA : "+getCGPA());
        System.out.println();
    }
}
