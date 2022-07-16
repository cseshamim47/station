public class Course {
    private String courseName;
    private String courseId;
    Course(){}
    Course(String courseName, String courseId){
        this.courseName = courseName;
        this.courseId = courseId;
    }

    public void setCourseName(String courseName){
        this.courseName = courseName;
    }
    public void setCourseId(String courseId){
        this.courseId = courseId;
    }

    public String getCourseName(){ return courseName; }
    public String getCourseId(){ return courseId; }

}
