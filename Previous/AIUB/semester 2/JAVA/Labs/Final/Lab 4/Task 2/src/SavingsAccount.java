public class SavingsAccount extends Account{
    double interestRate;

    SavingsAccount(){}
    SavingsAccount(String accountNo, double balance, int interestRate){
        super(accountNo,balance);
        this.interestRate = interestRate;
    }

    public void setInterestRate(double interestRate) {
        this.interestRate = interestRate;
    }
    public double getInterestRate() {
        return interestRate;
    }
}
