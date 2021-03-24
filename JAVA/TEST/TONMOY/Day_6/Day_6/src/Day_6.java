public class Day_6 {
    public static void main(String[] args) {
        // function :
        // while loop : prime factor numbers, find first digit
        // if / else :
        // for loop : prime factor numbers, Next prime number, find first digit, pattern, slice of pizza, table of number
        // hw : next prime number : x = 7; x++ = 8, 9, 10, 11

//        int n = 4; // 3 3 ans < n
//        if(isPrime(n)) System.out.println("Prime");
//        else System.out.println("Not Prime");
//
//        primeFactor(n);

//        sliceOfPizza(3);

    }


//    table of number :

//    2 x 1 = 2
//    2 x 2 = 4
//    2 x 3 = 6
//    2 x 4 = 8

//                    *
//                  * *
//                * * *
//              * * * *
//            * * * * *

//            *
//            * *
//            * * *
//            * * * *
//            * * * * *




//        static void sliceOfPizza(int n){ // 3
//                int i = 1;
//                while(i <= n) {
//                    int j = 1;
//                    while(j <= n - i){ // 1 < 0
//                        System.out.print(" ");
//                        j++; // 2
//                    }

//                    while(j<=n){ // 2 <= 3
//                        System.out.print("*");
//                        j++;
//                    }
//                    System.out.println();
//                    i++;
//                }
//        }





    static void primeFactor(int n){
        for(int i = 2; i <= n; i++){
            if(isPrime(i)){
                int x = i;
                while(n%x==0){
                    System.out.print( i + " ");
                    x = x*x;
                }
            }
        }


    }


    static boolean isPrime(int n){
        int x = 2;
        while(x <= n/2){
            if(n%x==0) return false;
            x++;
        }
        return true;
    }
}
