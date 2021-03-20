import java.lang.*;

public class Start {
    public static void main(String[] args) {
        Product productOne = new Product();
        productOne.setProductId("5000");
        productOne.setProductName("Potato");
        productOne.setPrice(1005.50);
        productOne.setAvailableQuantity(305);
        productOne.showDetails();
    }
}
