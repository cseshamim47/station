import java.lang.*;

public class Account{
    static int count = 0;
    String accountName;
    double balance;
    Account(){
        count++;
    }
    Account(String an,double b){
        accountName = an;
        balance = b;
    }
    void deposit(double am){
        balance += am;
    }
    void withdraw(double am){
        balance -= am;
    }
    void displayInfo(){
        System.out.println("Account name: "+accountName);
        System.out.println("Account balance: "+balance);
        System.out.println("Objects Created : "+count);
    }

    public static void main(String[] args){
        Account a1 = new Account();
        Account a2 = new Account();
        Account a3 = new Account();
        Account a4 = new Account();
        Account a5 = new Account();

        Account ac1 = new Account("Mahfuzur Rahman Ferdous", 4000);
        ac1.deposit(1000);
        ac1.withdraw(500);
        ac1.displayInfo();
    }
}
