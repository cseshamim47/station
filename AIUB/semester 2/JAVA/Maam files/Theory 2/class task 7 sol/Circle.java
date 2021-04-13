import java.lang.*;
public class Circle extends Shape
{
	private double radius;
	
	public Circle()
	{
		
	}
	public Circle(double radius)
	
	{
		super(radius,radius);
	}
	void displayArea()
	{
		double area;
		area=3.14*getDim1()*getDim2();
		System.out.println("Area of circle is "+area);
	}
	
}