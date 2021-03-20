public class Account {
    private long accId;
    private String accName;
    private double accBalance;

    Account(){}

    public void setAccId(long accId){
        this.accId = accId;
    }
    public long getAccId(){
        return accId;
    }
    public void setAccName(String accName){
        this.accName = accName;
    }
    public String getAccName(){
        return accName;
    }
    public void setAccBalance(double accBalance){
        this.accBalance = accBalance;
    }

}
