package Classes;
import java.lang.*;
import Interfaces.*;

public class Restaurant implements FoodItemOperations
{
	private String rid;
	private String name;
	private FoodItem fooditems[] = new FoodItem [10];
	
	public void setName(String resname)
	{
		this.name = resname;
	}

	public void setRid(String resId)
	{
		this.rid = resId;
	}

	public String getName()
	{
		return name;
	}

	public String getRid()
	{
		return rid;
	}
	
public boolean insertFoodItem(FoodItem foo)
	{
		boolean flag = false;
		for(int i=0; i<fooditems.length; i++)
		{
			if(fooditems[i] == null)
			{
				fooditems[i] = foo;
				flag = true;
				break;
			}
		}
		return flag;
	}
	
	public boolean removeFoodItem(FoodItem foo)
	{
		boolean flag = false;
		for(int i=0; i<fooditems.length; i++)
		{
			if(fooditems[i] == foo)
			{
				fooditems[i] = null;
				flag = true;
				break;
			}
		}
		return flag;
	}
	
	public void showAllFoodItems()
	{
		for(int i =0; i<fooditems.length; i++)
		{
			if(fooditems[i] != null)
			{
				fooditems[i].showInfo();
			}
		}
	}

	public FoodItem searchFoodItem(String fooid)
	{
		FoodItem foo = null;
		
		for(int i=0; i<fooditems.length; i++)
		{
			if(fooditems[i] != null)
			{
				if(fooditems[i].getFid().equals(fooid))
				{
					foo = fooditems[i];
					break;
				}
			}
		}
		return foo;
	}
}	