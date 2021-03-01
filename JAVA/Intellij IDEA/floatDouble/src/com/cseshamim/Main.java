package com.cseshamim;

public class Main {

    public static void main(String[] args) {

        float floatMax = Float.MAX_VALUE;
        float floatMin = Float.MIN_VALUE;
        System.out.println("Min value of Float is : "+floatMin);
        System.out.println("Max value of Float is : "+floatMax);

        double doubleMax = Double.MAX_VALUE;
        double doubleMin = Double.MIN_VALUE;
        System.out.println("Min value of Double is : "+doubleMin);
        System.out.println("Max value of Double is : "+doubleMax);


	    float floatVal = 4.55f;
	    double doubleVal = 4.3333d;

        System.out.println("My float value : " +floatVal);
        System.out.println("My double value : " +doubleVal);

        float remFval = (float) 4.55;
        System.out.println("After removing the f keyword : "+remFval);

        int myIntVal = 5/2;
        float myFloatVal = 5.5f / 2f;
        double myDoubleVal = 5.55555d / 2d;
        System.out.println("My int val : "+myIntVal);
        System.out.println("My float val : "+myFloatVal);
        System.out.println("My double val : "+myDoubleVal);
    }
}
