public class Start {
    public static void main(String[] args) {
        FixedAccount empty = new FixedAccount();
        FixedAccount obj = new FixedAccount(1.5);

        obj.setAccountName("Md Shamim Ahmed");
        obj.setAccountNumber("20-44242-3");
        obj.setBalance(500.5);
        obj.setYear(2021);

        System.out.println("Account name : "+ obj.getAccountName());
        System.out.println("Account Number is : "+ obj.getAccountNumber());
        System.out.println("Balance is : "+ obj.getBalance());
        System.out.println("Interest Rate : "+ obj.getInterestRate());
        System.out.println("Year is : "+ obj.getYear());
        System.out.println("Total Interest amount is : "+ obj.calculateInterestAmount());

    }

}
