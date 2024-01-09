package week6.exercises;

public class Student extends Person{
    public String studentId;
    public double cgpa;

    Student(){}

    public void describeStudent(String studentId,double cgpa){
        this.studentId = studentId;
        this.cgpa = cgpa;
    }
    public void displayDailyActivity(){
        System.out.println("my name is "+name+ " I am " +
                age + " years old.");
        System.out.println("My id is "+studentId+ " " +
                "my cgpa is " + cgpa);
        System.out.println("My activities as a person: " +
                "woking up, taking breakfast, doing exercise," +
                " sleeping and so on.");
        System.out.println("My activities as a student" +
                ":I attend classes, do assignment," +
                "sit for exams and so on");
    }
}
