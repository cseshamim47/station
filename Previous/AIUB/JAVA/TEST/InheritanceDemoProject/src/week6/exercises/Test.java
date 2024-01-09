package week6.exercises;

public class Test {

    public static void main(String[] args) {
        Person personObj = new Person();
        personObj.describePerson("Sumaiya",18);
        personObj.displayDailyActivity();
        System.out.println();
        Student studentObj = new Student();
        studentObj.describeStudent("111",3.75);
        studentObj.describePerson("Sumaiya",18);
        studentObj.displayDailyActivity();
    }
}



