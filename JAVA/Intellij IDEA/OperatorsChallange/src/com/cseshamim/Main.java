package com.cseshamim;

public class Main {

    public static void main(String[] args) {
        double varOne = 20.00;
        double varTwo = 80.00;
        double sumAndMul = (varOne+varTwo)*100.00;
        double remainder = sumAndMul % 40;
        boolean isRemainderZero = remainder == 0 ? true : false;
        System.out.println(isRemainderZero);
        if(!isRemainderZero) System.out.println("Got some remainder");
    }
}
