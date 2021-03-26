import java.util.Vector;

public class Day_7 {

    // while loop :
    // for loop :
    //    class
    //    recursive function
    // fibonacci series 1 1 2 3 5 8 13


    public static void main(String[] args) {
//        System.out.println("I printed \"Hello World\" "); // Escape sequence
//        System.out.println("file\\:C\\Movies"); // Escape sequence

//        int x = 1;
//        int y = 0;
//        int or = x | y;
//        int and = x & y;
//        int xor = x ^ y;
//        long neg = ~x;
//
//        System.out.println(or);
//        System.out.println(and);
//        System.out.println(xor);
//        System.out.println(neg);

        int n = 24;
        int arr[] = new int[32];

//        int arr2[] = {1,2,3,4,5};

//        int arr3[];
//        arr3 = new int[n];

//        int arr4[] = new int[]{1,2,3,4};


        // 00011 -1 00000000000
    //     11000 -1 00000000000
        int index = 0;
        while(n>0){ // 3
            int mod = n%2;
            arr[index] = mod;
            n = n / 2; // 0
            if(n<=0) arr[index+1] = -1;
            index++;
        }

//        for(int i = 0; i<32; i++){
//            if(arr[i]==-1){
//                for(int j = i-1; j>=0; j--){
//                    System.out.print(arr[j] + " ");
//                }
//            }
//        }


//      System.out.println();
//        for(int x : arr) System.out.print(x + " ");
//
//        System.out.println();


//        bin : 11000
//        dec : 24

//
//          int binary = 11000;
//
//          int ans = 0;
//          int exponent = 1;
//
//          while(binary > 0){
//              int last_digit = binary % 10;         // 0 0 0 1 1
//              ans = ans + (exponent * last_digit); // 8 + 16 = 24
//              binary /= 10; // 0
//              exponent = exponent * 2;            // 2 4 8 16
//          }
//
//        System.out.println(ans);


        // if(24%i == 0 && 12%i == 0) ans = i; // 12

//        int gcd = 1;
//        int a = 11;
//        int b = 7;
//        int minimum;
//        if(a>b) minimum = b;
//        else minimum = a;
//
//        for(int i = 1; i <= minimum; i++){
//            if(b%i == 0 && a%i == 0) gcd = i;
//        }
//        System.out.println(gcd);


//        int a = 24;
//        int b = 12;
//        int end = a*b;
//        int max;
//        if(a>b) max = a;
//        else max = b;
//        int ans = max;
//        int start = max;
//        while(start<=end){
//            if(start%a == 0 && start%b == 0){ // 7 5
//                ans = start;
//                break;
//            }
//            start++; // 35
//        }
//        System.out.println(start);

    }


}
