package com.edureka;


class helloWorld{
    void test(){
        System.out.println("Non static method final");
    }
    public static void staticTest(){
        System.out.println("Static test");
    }
    public static void main(String[] args){
        helloWorld obj = new helloWorld();
        System.out.println("Hello World");
        obj.test();
        staticTest();
    }
}