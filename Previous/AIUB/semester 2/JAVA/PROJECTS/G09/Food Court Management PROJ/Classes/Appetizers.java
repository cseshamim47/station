package Classes;
import java.lang.*;

public class Appetizers extends FoodItem
{
	private String size;
	
	public void setSize(String size)
	{
		this.size = size;
	}

	public String getSize()
	{
		return size;
	}

	public void showInfo()
	{
		System.out.println("Food ID: "+ getFid());
		System.out.println("Name: "+ getName());
		System.out.println("Available Quantity: "+ getAvailableQuantity());
		System.out.println("Price: " + getPrice());
		System.out.println("Size: " + size);
		System.out.println();
	}
}

	
		
	