package com.product;

class Product {
    private String productId;
    private String productName;
    private double price;
    private int availableQuantity;

    Product(){};
    public void setProductId(String id){
        productId = id;
    }
    public String getProductId(){
        return productId;
    }
    public void setProductName(String name){
        productName = name;
    }
    public String getProductName(){
        return productName;
    }
    public void setPrice(double p){
        price = p;
    }
    public double getPrice(){
        return price;
    }
    public void setAvailableQuantity(int quantity){
        availableQuantity = quantity;
    }
    public int getAvailableQuantity(){
        return availableQuantity;
    }

    public void showDetails(){
        System.out.println("Product id : "+getProductId());
        System.out.println("Product name : "+getProductName());
        System.out.println("Product price : "+getPrice());
        System.out.println("Product quantity : "+getAvailableQuantity());
    }




}
