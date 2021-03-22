public class day_4 {
    // function :
    // while loop : dekhe ashaba
    // if / else : done
    // for loop : dekhe ashba

    // hw : if else + for loop + function with non parameter and parameter + main method will contain only static methods
    //print first digit (using for loop)
    //task : -35 (break when -35)

    public static void main(String[] args) {
//        System.out.println(isTrue());
//        System.out.println(myInt());
//        System.out.println(myAnotherInt());


//        int x = 10;
//        boolean myBool = x+10 > (x++)+10 ? true : false;
//        System.out.println(myBool);
//        System.out.println(x);



//        printUpToTen();



//        for(int i = 0;;i++){
//
//          if(i == 25){
//              System.out.println(i);
//              System.out.println("Now I'm breaking"); // task : -35
//              break;
//          }
//            System.out.print(i + " ");
//        }


//        int n = 5;
//        int sum = n*(n+1)/2;
//        System.out.println(sum);

//          int x = 599;
//          int lastDigit = x%10;
//          System.out.println(lastDigit);

        // print first digit


    }

    static boolean isTrue(){
        if(10>20) return true;
        else return false;
    }
    static int myInt(){
        return 10;
    }

    static int myAnotherInt(){
        return myInt() + 25;
    }

    static void printUpToTen(){
        int x,sum=0;

        for(x = 1; x <= 10; x++){
            if(x==10) continue;  // hint : use if and else
            System.out.print(x + " + "); // 2 sout will be there
            sum += x; // sum = sum + x;
        }
        System.out.println( " = " + sum);
    }



}
