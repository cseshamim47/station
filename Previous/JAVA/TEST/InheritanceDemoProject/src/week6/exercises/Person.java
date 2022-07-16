package week6.exercises;

public class Person {
    public String name;
    public int age;

    Person(){}

    public void describePerson(String name, int age){
        this.name = name;
        this.age = age;
    }
    public void displayDailyActivity(){
        System.out.println("my name is "+name+ " I am " +
                age + " years old.");
        System.out.println("My activities as a person: " +
                "woking up, taking breakfast, doing exercise," +
                " sleeping and so on.");
    }

}
