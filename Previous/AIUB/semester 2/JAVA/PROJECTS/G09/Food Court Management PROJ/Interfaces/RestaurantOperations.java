package Interfaces;
import java.lang.*;
import Classes.Restaurant;

public interface RestaurantOperations
{
	boolean insertRestaurant(Restaurant res);
	boolean removeRestaurant(Restaurant res);
	Restaurant searchRestaurant(String resId);
	void showAllRestaurants();
}

