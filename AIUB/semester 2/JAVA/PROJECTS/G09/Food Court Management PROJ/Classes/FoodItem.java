package Classes;
import java.lang.*;
import Interfaces.*;

public abstract class FoodItem implements IQuantity
{
	protected String fid;
	protected String name;
	protected int quantity;
	protected double price;
	
	public void setFid(String foo)
	{
		this.fid = foo;
	}

	public void setName(String name)
	{
		this.name = name;
	}

	public void setAvailableQuantity(int quantity)
	{
		this.quantity = quantity;
	}

	public void setPrice(double price)
	{
		this.price = price;
	}

	public String getFid()
	{
		return fid;
	}
	
	public String getName()
	{
		return name;
	}
	
	public int getAvailableQuantity()
	{
		return quantity;
	}
	
	public double getPrice(){
		return price;
	}
	
	public abstract void showInfo();

	public boolean addQuantity(int amount)
	{
		if(amount > 0)
		{
			System.out.println("Previous Quantity: "+ quantity);
			System.out.println("New Amount Added: "+ amount);
			quantity = quantity + amount;
			System.out.println("Current Quantity: "+ quantity);
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public boolean  sellQuantity(int amount)
	{
		if(amount > 0 && amount <= quantity)
		{
			System.out.println("Previous Quantity: "+ quantity);
			System.out.println("The Amount Sold: "+ amount);
			quantity = quantity - amount;
			System.out.println("Current Quantity: "+ quantity);
			return true;
		}
		else
		{
			return false;
		}
	}	
}		