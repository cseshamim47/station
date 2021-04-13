import java.util.Scanner;

public class friend {

    static int count = 0;
    static String arr[][] = new String[5][5];
    static boolean narr[][] = new boolean[5][5];

    public static void inputFriend(){
        Scanner obj = new Scanner(System.in);

        for(int i = 0; i < 5; i++){
            for(int j = 0; j < 5; j++){
                System.out.print("Is row = " + i + " & Col = "+ j
                        +" are friends(\"*\" for friend & press enter for not friend ) ? : ");
                arr[i][j] = obj.nextLine();
                if(!arr[i][j].equals("*")) arr[i][j] = " ";
                narr[i][j] = arr[i][j].equals("*");
            }
        }
        System.out.println();
        System.out.println("The friend/not friend table : ");
        System.out.println();
        for(int i = 0; i < 5; i++){
            for(int j = 0; j < 5; j++){
                if(narr[i][j] == narr[j][i] && i != j) narr[i][j] = false;
                System.out.print(arr[i][j] + " ");
            }
            System.out.println();
        }
    }
    public static void countFriend(){
        for(int i = 0; i < 5; i ++){
            for(int j = 0; j < 5; j++){
                if(narr[i][j]) count++;
            }
        }
        System.out.println("Number of Friends : "+ count);
    }

    public static void main(String[] args) {
        inputFriend();
        countFriend();
    }
}