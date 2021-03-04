public class FixedAccount extends Account {
    private double interestRate;
    private int year;
    FixedAccount(){}
    FixedAccount(double ir){
        interestRate = ir;
    }
    public void setInterestRate(double ir){
        interestRate = ir;
    }
    public double getInterestRate(){
        return interestRate;
    }
    public void setYear(int y){
        year = y;
    }
    public int getYear(){
        return year;
    }
    public double calculateInterestAmount(){
        return getBalance()*year*interestRate;
    }
}
