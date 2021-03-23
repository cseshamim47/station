package com.product;

public class Main {
    public static void main(String[] args) {
        Product productOne = new Product();
        productOne.setProductId("1010");
        productOne.setProductName("Iphone 25");
        productOne.setPrice(25405.66);
        productOne.setAvailableQuantity(508);
        productOne.showDetails();
    }
}
