package com.cseshamim;

public class Main {

    public static void main(String[] args) {
        //Eight primitive data-types
        //  byte
        //  short
        //  int
        //  bool
        //  float
        //  double
        //  char
        //  long

        String myString = "This is my first string";
        System.out.println(myString);
        myString = myString + ", Another one";
        System.out.println(myString);
        int myIntVal = 10;
        myString = "15"+myIntVal;
        System.out.println(myString);
        double myDoubleVal = 50.05d;
        myString += myDoubleVal;
        System.out.println(myString);
        myString = "cseshamim \u00A9 2021";
        System.out.println(myString);
    }

}
