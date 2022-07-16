public class Customer {
    int nid;
    String name;

    SavingsAccount savingsAccount[];
    FixedAccount fixedAccount[];

    Customer(){}
    Customer(int nid, String name, int size1, int size2){
        this.nid = nid;
        this.name = name;
        savingsAccount = new SavingsAccount[size1];
        fixedAccount = new FixedAccount[size2];
    }

    public void setNid(int nid) {
        this.nid = nid;
    }
    public int getNid() {
        return nid;
    }

    public void setName(String name) {
        this.name = name;
    }
    public String getName() {
        return name;
    }

    public void addSavingsAccount(SavingsAccount sa){
        int flag = 0;
        for(int i = 0; i < savingsAccount.length; i++){
            if(savingsAccount[i] == null){
                savingsAccount[i] = sa;
                flag = 1;
                break;
            }
        }
        if(flag == 0) System.out.println("SavingsAccount was not inserted. Try again later");
        else System.out.println("SavingsAccount inserted");
    }
    public void removeSavingsAccout(SavingsAccount sa){
        int flag = 0;
        for(int i = 0; i < savingsAccount.length; i++){
            if(savingsAccount[i] == sa){
                savingsAccount[i] = null;
                flag = 1;
                break;
            }
        }
        if(flag == 0) System.out.println("SavingsAccount Removal Failed. Try again later");
        else System.out.println("SavingsAccount removed");
    }
    public void showAllSavingAccounts(){
        for(int i = 0; i < savingsAccount.length; i++){
            if(savingsAccount[i] != null){
                System.out.println("Savings Account NO : "+ savingsAccount[i].getAccountNo());
                System.out.println("Balance : "+ savingsAccount[i].getBalance());
                System.out.println("Interest Rate : "+ savingsAccount[i].getInterestRate());
            }
        }
    }
    public void addFixedAccount(FixedAccount fa){
        int flag = 0; 
        for(int i = 0; i < fixedAccount.length; i++){
            if(fixedAccount[i] == null){
                fixedAccount[i] = fa;
                flag = 1;
                break;
            }
        }
        if(flag == 0) System.out.println("FixedAccount was not inserted. Try again later");
        else System.out.println("FixedAccount inserted");
    }
    public void removeFixedAccount(FixedAccount fa){
        int flag = 0;
        for(int i = 0; i < fixedAccount.length; i++){
            if(fixedAccount[i] == fa){
                fixedAccount[i] = null;
                flag = 1;
                break;
            }
        }
        if(flag == 0) System.out.println("FixedAccount Removal Failed. Try again later");
        else System.out.println("FixedAccount removed");
    }
    public void showAllFixedAccounts(){
        for(int i = 0; i < fixedAccount.length; i++){
            if(fixedAccount[i] != null){
                System.out.println("Fixed Account No : "+ fixedAccount[i].getAccountNo());
                System.out.println("Balance : "+ fixedAccount[i].getBalance());
                System.out.println("Tenure year : "+fixedAccount[i].getTenureYear());
            }
        }
    }

}
