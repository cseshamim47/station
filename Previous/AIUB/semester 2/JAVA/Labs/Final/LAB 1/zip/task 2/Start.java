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

        System.out.println("shopName is : " + s1.getShopName());
        System.out.println("city : " + s1.getCity());
        System.out.println("custName is : " + s1.getCustomer().getCustName());
        System.out.println("custNid is : " + s1.getCustomer().getCustNid());

        System.out.println();

        System.out.println("shopName is : " + empty.getShopName());
        System.out.println("city : " + empty.getCity());
        System.out.println("custName is : " + empty.getCustomer().getCustName());
        System.out.println("custNid is : " + empty.getCustomer().getCustNid());

    }
}
