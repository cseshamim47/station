package Interfaces;
import java.lang.*;
import Classes.FoodItem;

public interface FoodItemOperations
{
	boolean insertFoodItem(FoodItem foo);
	boolean removeFoodItem(FoodItem foo);
	FoodItem searchFoodItem(String fooid);
	void showAllFoodItems();
}

