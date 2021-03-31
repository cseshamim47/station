public class Customer {
    static int i = 0;
    private String name;
    private String gender;
    Account accounts[];
    Customer(){}
    Customer(String name, String gender){
        this.name = name;
        this.gender = name;
    }
    public void setName(String name){
        this.name = name;
    }
    public void setGender(String gender){
        this.gender = gender;
    }
    public void insertAccount(Account acc[]){
        accounts = acc;
    }

//    public void insertAccount(Account acc){
//        accounts[i] = acc;
//        i++;
//    }

    public String getName(){ return name; }
    public String getGender(){ return  gender; }

    public void displayAccount(){

        for(int i = 0; i < accounts.length; i++){
            if(accounts[i]!=null){
            System.out.println("Account name : "+accounts[i].getAccountName());
            System.out.println("Account no : "+accounts[i].getAccountNo());
            System.out.println("Account balance : "+accounts[i].getBalance());
            }
        }

    }
}
