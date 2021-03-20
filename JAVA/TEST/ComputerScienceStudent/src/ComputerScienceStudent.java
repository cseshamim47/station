public class ComputerScienceStudent extends Student {
    public String major;
    ComputerScienceStudent(String major){
        this.major = major;
    }
    public void describeStudent(String name, int age,String studentId,double cgpa){
        this.name = name;
        this.age = age;
        this.studentId = studentId;
        this.cgpa = cgpa;
    }

    public void displayInfo(){
        System.out.println("*******ComputerScienceStudent class outputs: ************");
        System.out.println("my name is "+name+ " I am " +
                age + " years old.");
        System.out.println("My id is "+studentId+ " " +
                "my cgpa is " + cgpa);
        System.out.println("My department is "+major);
        System.out.println("My activities as a person: woking up, taking breakfast, doing exercise, sleeping and so on.");


    }

}
