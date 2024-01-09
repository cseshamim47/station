public class day_8{

    day_8(){
        System.out.println("Parent : I'm empty con");
    }
    day_8(int x){
        System.out.println("Parent : Integer con");
    }

    // polymorphism : function overloading and function overriding
    // function :
    // hw : fibonacci series 1 1 2 3 5 8 13 up to 100
    // hw : steps problem by fibonacci series


    // function overloading
    static void tonmoy(){
        System.out.println("I'm empty parameter");
    }
    static void tonmoy(String x){
        System.out.println("I'm "+ x);
    }
    static void tonmoy(String name,int age){
        System.out.println("I'm "+ name + " and I am "+ age);
    }
    static void tonmoy(double salary){
        System.out.println("My salary is " + salary);
    }
    static void tonmoy(int salary){
        System.out.println("My salary is " + salary);
    }

    static int x(int n){
        return n;
    }

//    public static void main(String[] args) {
////        stepsFibonacci(5);
////        tonmoy("Tonmoy");
////        tonmoy("Tonmoy",20);
////        tonmoy(10000d);
////          tonmoy(10000);
//    }

    static void stepsFibonacci(int n){
        int a = 1;
        int b = 1;
        int c = a + b;
        int ans = c+2;

        for(int i = 3; i <= n; i++){

            a = b;
            b = c;
            c = a + b;

            ans += c; // 1 1 2 3 5
//            if(i==n) ans += c;
        }
        System.out.println(c);
        System.out.println(ans);
    }

}
