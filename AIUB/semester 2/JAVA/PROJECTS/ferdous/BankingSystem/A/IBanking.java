package A;
import java.io.*;
import java.math.*;

public interface IBanking{
	
	public void CreateAccount();
	public void deposit();
	public void withdraw();
	public void PreviousTransaction(double prevBalance);
	public void showBalance(double balance);
	public void showAccountInfo(int Account_number, String Customer_name, double balance);
	public void showMenu();
	
}