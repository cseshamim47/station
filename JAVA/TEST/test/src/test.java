import java.io.File;
import java.util.Scanner;

public class test {
    test(){}

    public static void fileSystem(){
        try{
            File file = new File("db/db.txt");
            Scanner input = new Scanner(file);

            while (input.hasNext()) {
                String str = input.next();
                if(str.equals("#")){
                    System.out.println();
                    continue;
                }
                System.out.print(str + " ");
            }
        }catch (Exception e){
            System.out.println(e);
        }

    }

    public static void main(String[] args) {
//        fileSystem();

//        Scanner sc = new Scanner(System.in);
//        String str = sc.nextLine();
//        try{
//            int cast = Integer.parseInt(str);
//            System.out.println(cast);
//        }catch (Exception e){
//            System.out.println(e);
//        }

//        Scanner input = new Scanner(System.in);
//        char option = 'a';
//        int optionInt = option;
//        System.out.println((int)option);

        New.test();

    }

    public static void pause(){
        Scanner scanner = new Scanner(System.in);
        scanner.nextLine();
    }
}
