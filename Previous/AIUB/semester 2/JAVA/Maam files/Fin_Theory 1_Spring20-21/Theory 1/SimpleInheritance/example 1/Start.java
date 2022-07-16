public class Start
{
	public static void main(String args[])
	{
		Teacher t1=new Teacher(1000,"101");
		t1.setName("Shakib");
		t1.setAge(30);
		t1.setGender("male");
		t1.showInfo();
		Teacher t2=new Teacher(1000);
		t2.setId("102");
		t2.setName("Tamim");
		t2.setAge(31);
		t2.setGender("male");
		t2.showInfo();
		Person p1=new Person("Mashrafi",30,"male");
		p1.showInfo();
		
		
	}
}