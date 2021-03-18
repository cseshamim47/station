public class Student {
    public String studentId;
    public double cgpa;
    public String name;
    public int age;

    Student(){}

    public void describeStudent(String name, int age,String studentId,double cgpa){
        this.name = name;
        this.age = age;
        this.studentId = studentId;
        this.cgpa = cgpa;
    }

}