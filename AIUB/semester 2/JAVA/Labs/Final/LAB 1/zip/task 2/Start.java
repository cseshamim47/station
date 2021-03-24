public class Start {
    public static void main(String[] args) {
        Shop empty = new Shop();

        Shop s1 = new Shop("Ma Baba Store","Dhaka");
        Customer a1 = new Customer("Kuddus Ali","1231234123");
        s1.setCustomer(a1);

        empty.setShopName("Banani shop");
        empty.setCity("Banani");
        empty.setCustomer(a1);

        Shop s2 = new Shop("On On Store","Barishal");
        s2.setCustomer(a1);

        s1.showDetails();
        System.out.println();
        s2.showDetails();

        System.out.println("-----------------");
        System.out.println(s1.getCustomer().getCustName());
        System.out.println(s1.getCustomer().getCustNid());

    }
}
