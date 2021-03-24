import java.lang.*;

public class Shop {

    private String shopName;
    private String city;
    Customer customer;

    public Shop() {}
    public Shop(String shopName, String city) {
        this.shopName = shopName;
        this.city = city;
    }

    public void setShopName(String shopName) {
        this.shopName = shopName;
    }

    public void setCity(String city) {
        this.city = city;
    }

    public void setCustomer(Customer customer) {
        this.customer = customer;
    }

    public Customer getCustomer() {
        return customer;
    }

    public String getShopName() {
        return shopName;
    }

    public String getCity() {
        return city;
    }

}