public class Day_5 {

    // function :
    // while loop : prime number, prime factor numbers, find first digit
    // if / else :
    // for loop : prime number, prime factor numbers, find first digit, pattern, slice of pizza

    // hw : use while loop to construct above mentioned programs

    public static void main(String[] args) {
       // primeOrNot();
//        int i = 5;
//        do{
//            System.out.println("I'll execute even the condition is false");
//            i--;
//        }while(i>5);


        int pf = 59;
//        int checker = 1;
//
//        for(int i = 2; i<=pf;i++){ // 3
//            if(primeOrNot(i)){
//                int answer = i; // 9
//                while(pf%answer==0){ // 12 % 9 = false
//                    System.out.print(i + " "); // 2 2 3
////                    checker *= i; // 2+3+2
//                    answer = answer * answer; // 9
//                }
//            }
////            if(checker==pf) break;
//        }

//        int i = 1;
//        int y=10;
        while(pf/10!=0){
            pf = pf / 10;
        }
        System.out.println(pf);
    }

    static boolean primeOrNot(int x){
        boolean isTrue = true;
        int n = x;
        for(int i = 2; i <= n/2; i++){
            if(n%i==0){
                isTrue = false;
                break;
            }
        }

        if(isTrue) {
//            System.out.println("Prime");
            return true;
        }
        else{
//            System.out.println("Not prime");
            return false;
        }
    }
}
