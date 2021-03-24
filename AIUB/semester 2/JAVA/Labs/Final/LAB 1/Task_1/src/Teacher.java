public class Teacher extends Person {
    private String teacherId;
    private String teacherDesignation;

    Teacher(){}
    Teacher(String type, String name, String gender, int age,String  teacherId, String teacherDesignation){
        super(type,name,gender,age);
        this.teacherId = teacherId;
        this.teacherDesignation = teacherDesignation;
    }

    public void setTeacherId(String teacherId){
        this.teacherId = teacherId;
    }
    public void setTeacherDesignation(String teacherDesignation){
        this.teacherDesignation = teacherDesignation;
    }
    public String getTeacherId(){return teacherId;}
    public String getTeacherDesignation(){return teacherDesignation;}

    public void Display(){
        System.out.println("Type : "+getType());
        System.out.println("Name : "+getName());
        System.out.println("Gender : "+getGender());
        System.out.println("Age : "+getAge());
        System.out.println("Teacher id : "+teacherId);
        System.out.println("Teacher Designation : "+teacherDesignation);
    }

}
