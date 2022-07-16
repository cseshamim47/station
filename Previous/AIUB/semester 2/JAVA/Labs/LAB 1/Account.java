import java.util.*;

public class Account{
	private String accountNumber;
	private String accountName;
	private double Balance;
	
	public Account(){}
	public Account(String aid, String aname,double initialBalance){
		accountNumber = aid;
		accountName = aname;
		Balance = initialBalance;
	}
	void print(){
		System.out.println("Account Name : "+accountName);
		System.out.println("Account Number : "+accountNumber);
		System.out.println("Account Balance : "+Balance);
	}
	public static void main(String[] args){
		Account empty = new Account();
		Account a1 = new Account("20-44242-3", "Md Shamim Ahmed", 15203.55);
		a1.print();
	}
}