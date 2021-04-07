public class Start {
    public static void main(String[] args) {
        FixedAccount emptyFixedAccout = new FixedAccount();

        FixedAccount fixedAccoutObj1 = new FixedAccount("123",123.123,2019);
        FixedAccount fixedAccoutObj2 = new FixedAccount("124",123.123,2019);
        FixedAccount fixedAccoutObj3 = new FixedAccount("125",123.123,2019);
        FixedAccount fixedAccoutObj4 = new FixedAccount("126",123.123,2019);

        SavingsAccount emptySavingAccount = new SavingsAccount();

        SavingsAccount savingsAccountObj1 = new SavingsAccount("321",321.321,14);
        SavingsAccount savingsAccountObj2 = new SavingsAccount("322",321.321,14);
        SavingsAccount savingsAccountObj3 = new SavingsAccount("323",321.321,14);
        SavingsAccount savingsAccountObj4 = new SavingsAccount("324",321.321,14);

        Customer emptyCustomer = new Customer();

        Customer customerObj = new Customer(112313,"Ahmed Shakin",100,100);

        customerObj.setNid(1111);
        customerObj.setName("Salman Khan");
        System.out.println("Nid : "+ customerObj.getNid());
        System.out.println("Name : "+ customerObj.getName());
        customerObj.addFixedAccount(fixedAccoutObj1);
        customerObj.addFixedAccount(fixedAccoutObj2);
        customerObj.addFixedAccount(fixedAccoutObj3);
        customerObj.addFixedAccount(fixedAccoutObj4);
        customerObj.addSavingsAccount(savingsAccountObj1);
        customerObj.addSavingsAccount(savingsAccountObj2);
        customerObj.addSavingsAccount(savingsAccountObj3);
        customerObj.addSavingsAccount(savingsAccountObj4);
        customerObj.removeFixedAccount(fixedAccoutObj2);
        customerObj.removeSavingsAccout(savingsAccountObj3);
        customerObj.showAllSavingAccounts();
        customerObj.showAllFixedAccounts();
        System.out.println();


    }
}
