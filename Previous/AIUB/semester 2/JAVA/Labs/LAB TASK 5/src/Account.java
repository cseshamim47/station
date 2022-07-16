public class Account {
    private String accountName;
    private String accountNumber;
    private Double balance;
    Account(){}
    Account(String ana,String ano,double ba){}
    void setAccountName(String ana){
        accountName = ana;
    }
    void setAccountNumber(String ano){
        accountNumber = ano;
    }
    void setBalance(double ba){
        balance = ba;
    }
    public String getAccountName(){
        return accountName;
    }
    public String getAccountNumber(){
        return accountNumber;
    }
    public double getBalance(){
        return balance;
    }
}
