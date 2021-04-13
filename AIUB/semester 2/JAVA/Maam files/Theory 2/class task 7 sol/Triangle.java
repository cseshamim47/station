import java.lang.*;
public class Triangle extends Shape
{
	private double base;
	private double height;
	public Triangle()
	{
		
	}
	public Triangle(double base,double height)
	
	{
		super(base,height);
	}
	void displayArea()
	{
		double area;
		area=.5*getDim1()*getDim2();
		System.out.println("Area of triangle is "+area);
	}
	
}