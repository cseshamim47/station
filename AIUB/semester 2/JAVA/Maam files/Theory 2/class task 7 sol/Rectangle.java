import java.lang.*;
public class Rectangle extends Shape
{
	private double length;
	private double width;
	public Rectangle()
	{
		System.out.println("Inside Rectangle default cons");
		
	}
	public Rectangle(double length,double width)
	
	{	
		super(length,width);
		System.out.println("Inside Rectangle param cons");
	}
	void setLength(double length)
	{
		this.length=length;
	}
	double getLength()
	{
		return length;
	}
	void displayArea()
	{
		double area;
		area=getDim1()*getDim2();
		System.out.println("Area of rectangle is "+area);
	}
	
}