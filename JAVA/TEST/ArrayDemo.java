import java.util.Scanner;
public class ArrayDemo {
    
    public static void showSquarePattern(int n){
        char[][] arrDemo = new char[n][n];
        for(int i = 0; i < n; i++){
            for(int j = 0; j < n; j++){
                arrDemo[i][j] = '#';
                System.out.print(arrDemo[i][j]+" ");
            }
            System.out.println();
        }
    }
    public static void main(String[] args) {
        System.out.print("Input the number of characters for a side: ");

        Scanner x = new Scanner(System.in);
        int n = x.nextInt();
        showSquarePattern(n);
    }

}