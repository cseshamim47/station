package interfaces;
import java.lang.*;
import classes.Account;


public interface AccountOperations
{
	boolean insertAccount(Account a);
	boolean removeAccount(Account a);
	Account searchAccount(int accountNumber);
	void showAllAccounts();
}