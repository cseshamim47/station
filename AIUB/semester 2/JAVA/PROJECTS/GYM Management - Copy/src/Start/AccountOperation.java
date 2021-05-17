package Start;

interface AccountOperation {
	   public  boolean insertAccount(Account a);
	   public  boolean removeAccount(Account a);
	   public  Account getAccount(String accNo);
	   public  void showAllAccounts( );
	 
	}