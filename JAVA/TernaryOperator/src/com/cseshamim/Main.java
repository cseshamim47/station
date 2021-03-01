package com.cseshamim;

public class Main {

    public static void main(String[] args) {
        // ternary operator
        boolean myBoolVal = false;
        boolean isTernaryTrue = myBoolVal ? true : false;
        if(isTernaryTrue){
            System.out.println("The ternary statement is true");
        }else if(!isTernaryTrue) System.out.println("The ternary statement is not true");

        int myIntVar = 25;
        boolean isMyIntVarTrue = myIntVar == 25 ? true : false;
        if(isMyIntVarTrue){
            System.out.println("My int var turned to be true");
        }else System.out.println("Get outta my way");

        isMyIntVarTrue = myIntVar == 25 ? false : true;
        if(isMyIntVarTrue){
            System.out.println("My int var turned to be true");
        }else System.out.println("Get outta my way");
    }
}
