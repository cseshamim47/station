public class Start {
    public static void main(String[] args) {
        Account accountEmpty = new Account();
        Customer customerEmpty = new Customer();

        Account accountObject1 = new Account("Credit Account 1","234234",5005.234);
        Account accountObject2 = new Account("Debit Account 2","234235",4005.234);
        Account accountObject[] = new Account[2];
        accountObject[0] = accountObject1;
        accountObject[1] = accountObject2;


        Customer customerObject1 = new Customer("Md Khan","Male");
        customerObject1.setName("Md Khan");
        customerObject1.setGender("Male");
        customerObject1.insertAccount(accountObject);

//        Customer c2 = new Customer("Md Rasel","Male");
//        Account a3 = new Account("Debit account 3","34534534",1000.444);
//        Account a4 = new Account("credit account 4","34534534331",15234.444);
//        c2.insertAccount(a3);
//        c2.insertAccount(a4);

        System.out.println("-------------------");
        System.out.println("Customer Name : "+customerObject1.getName());
        System.out.println("Customer gender : "+customerObject1.getGender());
        customerObject1.displayAccount();




    }
}
