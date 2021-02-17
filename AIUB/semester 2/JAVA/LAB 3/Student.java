import java.lang.*;

class Student{
	String name = new String();
	int id;
	double cgpa;
	int semesterNo;
	static String universityName = "University name : AIUB";
	Student(){}
	Student(String n, int i, double c, int sn){
		name = n;
		id = i;
		cgpa = c;
		semesterNo = sn;
	}
	void display(){
		System.out.println("Name : "+name);
		System.out.println("Id : "+id);
		System.out.println("Cgpa : "+cgpa);
		System.out.println("Semester No : "+semesterNo);
	}
	public static void main(String[] args){
		Student empty = new Student();
		Student s1 = new Student("Md Shamim Ahmed",123123,4.00,2);
		System.out.println(universityName);
		s1.display();
		
	}
	
}