import java.lang.*;
public class Start
{
	public static void main(String args[])
	{
		Rectangle r1=new Rectangle(10,20);
		r1.displayArea();
		Shape s1=new Rectangle(10,10);
		s1.displayArea();
		Triangle t1=new Triangle(10,10);
		t1.displayArea();
		Shape s2=new Triangle(10,20);
		s2.displayArea();
		Circle c1=new Circle(1);
		c1.displayArea();
		
	}
}