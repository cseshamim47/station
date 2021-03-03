package com.cseshamim;

public class Main {


    public static void main(String[] args) {

        int intMax = Integer.MAX_VALUE;  // Integer is a wrapper class
        int intMin = Integer.MIN_VALUE;  // int occupy 32 bits meaning it has a width of 32 bits or 4 byte

        System.out.println("Int Max : "+intMax);    // intMax gets converted to String
        System.out.println("Int Min : "+intMin);

        int intMaxTest = intMax + 1;
        int intMinTest = intMin - 1;

        System.out.println("Int Max Test : "+intMaxTest+" (This is called overflow)");
        System.out.println("Int Min Test : "+intMinTest+" (This is called underflow)");

        int intMaxType = 2_14_74_83_647; // values can be written this way too

        byte byteMin = Byte.MIN_VALUE;  // width 8 bits or 1 byte
        byte byteMax = Byte.MAX_VALUE;
        System.out.println("Byte minimum value : "+byteMin);
        System.out.println("Byte maximum value : "+byteMax);

        short shortMin = Short.MIN_VALUE; // width 16 bits or 2 byte
        short shortMax = Short.MAX_VALUE;
        System.out.println("Short minimum value : "+shortMin);
        System.out.println("Short maximum value : "+shortMax);

        int myLongVal = 105;
        long longMin = Long.MIN_VALUE;
        long longMax = Long.MAX_VALUE;
        System.out.println("Long minimum value : "+longMin);
        System.out.println("Long maximum value : "+longMax);


        long bigLongVal = 2_14_748_3647_453L; // This is an actual long value
        //long bigLongValTest = 2_14_748_3647_453; // this is an error because the value is greater than int
        long LongLiteralValueInt = 1010;    // this is accepted because the long is converted to int cz I didn't append L in the end of the value

        // byte bigByteVal = 128;

        int myTotalValue = (intMin/2);
        short shortDiv = (short) (shortMin/2);
        byte byteDiv = (byte) (byteMax/2);



    }
}
