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

        byte byteMin = Byte.MIN_VALUE;
        byte byteMax = Byte.MAX_VALUE;
        System.out.println("Byte minimum value : "+byteMin);
        System.out.println("Byte maximum value : "+byteMax);

        short shortMin = Short.MIN_VALUE;
        short shortMax = Short.MAX_VALUE;
        System.out.println("Short minimum value : "+shortMin);
        System.out.println("Short maximum value : "+shortMax);

        long myLongVal = 105;
        long longMin = Long.MIN_VALUE;
        long longMax = Long.MAX_VALUE;
        System.out.println("Long minimum value : "+longMin);
        System.out.println("Long maximum value : "+longMax);
        long bigLongVal = 2_14_748_3647_453L;

        byte bigByteVal = 128;

        int myTotalValue = (intMin/2);
        short shortDiv = (short) (shortMin/2);
        byte byteDiv = (byte) (byteMax/2);

    }
}
