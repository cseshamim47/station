import java.util.*;

public class Student{
	private int studentId;
	private String studentName;
	
	public Student(){}
	public Student(int sid, String sname){
		studentId = sid;
		studentName = sname;
	}
	void print(){
		System.out.println("Student name: "+studentName);
		System.out.println("Student id: "+studentId);
	}
	public static void main(String[] args){
		Student empty = new Student();
		Student s1 = new Student(1010, "Md Shamim Ahmed");
		s1.print();
	}
	
}