import java.util.Scanner;

public class New {
    static  int i = 0;
    public static void test(){
        int first, second , test;
        Scanner scanner = new Scanner(System.in);
        try{
            System.out.println("Enter first Number : ");
            first = scanner.nextInt();
            System.out.println("Enter second Number : ");
            second = scanner.nextInt();
        }catch (Exception e){
            System.out.println(e);
            i++;
        }finally{
            if(i > 0){
                try{
                    scanner.nextLine();
                    System.out.println("Enter number again");
                    System.out.println("Enter first Number : ");
                    first = scanner.nextInt();
                    System.out.println("Enter second Number : ");
                    second = scanner.nextInt();
                    test = first/second;
                    System.out.println("result  =  "+test);
                }catch (Exception e){
                    System.out.println(e);
                }
            }
            System.out.println("Enter number again");
            System.out.println("Enter first Number : ");
            first = scanner.nextInt();
            System.out.println("Enter second Number : ");
            second = scanner.nextInt();
            test = first/second;
            System.out.println("result  =  "+test);

            System.out.println("Task Completed successfully. Thank you.");
        }

    }
}
