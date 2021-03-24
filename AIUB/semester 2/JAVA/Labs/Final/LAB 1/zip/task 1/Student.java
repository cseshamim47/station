public class Student extends Person{
    private String studentId;

    Student(){}
    Student(String type, String name, String gender, int age, String studentId){
        super(type,name,gender,age);
        this.studentId = studentId;
    }

    public void setStudentId(String studentId){
        this.studentId = studentId;
    }
    public String getStudentId(){return studentId;}

    public void Display(){
        System.out.println("Type : "+getType());
        System.out.println("Name : "+getName());
        System.out.println("Gender : "+getGender());
        System.out.println("Age : "+getAge());
        System.out.println("Student id : "+studentId);
    }
}
