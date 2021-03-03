import java.util.Scanner;

public class Main {
    public static void ArrDemo(){
        int size;
        System.out.print("How many names you you want to enter: ");
        Scanner sc = new Scanner(System.in);
        size = sc.nextInt();
        System.out.println();
        String[] str = new String[size];
        System.out.println("Enter top 4 names of the player in bd cricket team :");

        for(int i = 0; i < size; i++){
            System.out.print("Enter name " + (i+1) + ": ");
            str[i] = sc.next();
            //System.out.println();
        }

        System.out.println("The top 4 names you entered are : ");
        for(int i = 0; i < size ; i++){
            System.out.print(str[i]+"\t");
        }

    }

    public static void main(String[] args) {
        ArrDemo();
    }

}