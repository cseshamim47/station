import java.util.Scanner;

public class array {

    static int count = 0;
    static boolean arr[][] = new boolean[5][5];

    public static void inputFriend(){
        Scanner obj = new Scanner(System.in);

        for(int i = 0; i < 5; i++){
            for(int j = 0; j < 5; j++){
                System.out.print("Is row = " + i + " & Col = "+ j
                        +" are friends(true/false) ? : ");
                arr[i][j] = obj.nextBoolean();
            }
        }
        System.out.println();
        System.out.println("The friend/not friend table : ");
        System.out.println();


        for(int i = 0; i < 5; i++){
            for(int j = 0; j < 5; j++){
                if(arr[i][j]) System.out.print("*" + " ");
                else System.out.print("  ");
                if(arr[i][j] == arr[j][i] && i != j) arr[i][j] = false;
            }
            System.out.println();
        }

    }

    public static void countFriend(){
        for(int i = 0; i < 5; i ++){
            for(int j = 0; j < 5; j++){
                if(arr[i][j]) count++;
            }
        }
        System.out.println("Number of Friends : "+ count);
    }

    public static void main(String[] args) {
        inputFriend();
        countFriend();
    }

}


