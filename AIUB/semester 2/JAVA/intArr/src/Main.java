import java.util.Scanner;

public class Main {

    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        System.out.print("Enter an array size : ");
        int size = sc.nextInt();
	    int[] arr = new int[size];
	    int sum=0;
        System.out.print("Enter 8 integer variable : ");
        for(int i = 0; i < arr.length; i++){
	        arr[i] = sc.nextInt(); sum += arr[i];
        }
        System.out.println("Sum of all value : ");
	    for(int i = 0; i < arr.length; i++){
	        if(arr.length-1>i)
            System.out.print(arr[i] + " + ");
	        else System.out.print(arr[i] + " = ");
        }
        System.out.print(sum);
    }
}
