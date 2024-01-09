package com.cseshamim;

public class Main {

    public static void main(String[] args) {
	    short sVal = 1000;
	    byte bVal = 100;
        int iVal = 200;
        long lVal = (10L + 10L + (sVal+bVal+iVal));
        System.out.println(lVal);
//        System.out.println(Integer.MAX_VALUE);
    }
}
