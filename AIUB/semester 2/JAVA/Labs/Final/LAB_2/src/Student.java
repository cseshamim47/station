public class Student {
    String studentName;
    String studentId;
    Course course;

    Student(){}

    Student(String studentName, String studentId){
        this.studentName = studentName;
        this.studentId = studentId;
    }
    public void setStudentId(String studentId){
        this.studentId = studentId;
    }
    public void setStudentName(String studentName){
        this.studentName = studentName;
    }
    void insertCourse(Course course){
        this.course = course;
    }

    public String getStudentName(){ return studentName; }
    public String getStudentId(){ return studentId; }

    public void showCourseInformation(){
        System.out.println("Course Name : "+ course.getCourseName());
        System.out.println("Course Id : "+ course.getCourseId());
    }

}
