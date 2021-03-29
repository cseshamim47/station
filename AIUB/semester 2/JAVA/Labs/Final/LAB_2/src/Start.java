public class Start {
    public static void main(String[] args) {
        Course courseEmpty = new Course();
        Course courseObject1 = new Course("OOP JAVA","123123");
        courseObject1.setCourseId("23434534");
        courseObject1.setCourseName("OOP JAVA");

        Student studentEmpty = new Student();
        Student studentObject1 = new Student("Shahrukh Khan", "20202020");
        studentObject1.setStudentId("20-44242-3");
        studentObject1.setStudentName("Md Shamim Ahmed");

        studentObject1.insertCourse(courseObject1);

        System.out.println("Student Name : " + studentObject1.getStudentName());
        System.out.println("Student Id : " + studentObject1.getStudentId());
        studentObject1.showCourseInformation();




    }
}
