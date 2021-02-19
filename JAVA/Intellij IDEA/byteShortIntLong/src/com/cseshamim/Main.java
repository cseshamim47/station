package com.cseshamim;

public class Main {

    public static void main(String[] args) {
        int intMax = Integer.MAX_VALUE; // Integer is a wrapper class
        int intMin = Integer.MIN_VALUE;

        System.out.println("Int Max : "+intMax); // intMax gets converted to String
        System.out.println("Int Min : "+intMin);

        int intMaxTest = intMax + 1;
        int intMinTest = intMin - 1;
        System.out.println("Int Max Test : "+intMaxTest+" (This is called overflow)");
        System.out.println("Int Min Test : "+intMinTest+" (This is called underflow)");

        int intMaxType = 2_14_748_3647; // values can be written this way too


    }
}
