public class Account {
    private String accountName;
    private String accountNo;
    private double balance;
    Account(){}
    Account(String accountName, String accountNo, double balance){
        this.accountName = accountName;
        this.accountNo = accountNo;
        this.balance = balance;
    }

    public void setAccountName(String accountName){
        this.accountName = accountName;
    }
    public void setAccountNo(String accountNo){
        this.accountNo = accountNo;
    }
    public void setBalance(double balance){
        this.balance = balance;
    }

    public String getAccountName(){ return accountName; }
    public String getAccountNo(){ return accountNo; }
    public double getBalance(){ return balance; }

}
