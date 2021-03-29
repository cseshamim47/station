public class Start {
    public static void main(String[] args) {
        Course courseEmpty = new Course();
        Course courseObject1 = new Course("OOP JAVA","123123");
        courseObject1.setCourseId("123");
        courseObject1.setCourseName("C++ Programming");

        Student studentEmpty = new Student();
        Student studentObject1 = new Student("Shahrukh Khan", "20202020");
        studentObject1.setStudentId("203240");
        studentObject1.setStudentName("Salman Khan");

        studentObject1.insertCourse(courseObject1);

        System.out.println("Student Name : " + studentObject1.getStudentName());
        System.out.println("Student Id : " + studentObject1.getStudentId());
        studentObject1.showCourseInformation();




    }
}
