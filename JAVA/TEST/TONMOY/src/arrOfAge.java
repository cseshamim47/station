import java.util.Scanner;
public class arrOfAge {

    public static void  arrayofage(){
        Scanner sc=new Scanner(System.in);
        int age[]=new  int[5];
        for(int i=0;i<age.length;i++)
        {
            System.out.print("enter age "+(i+1)+" :");
            age[i]=sc.nextInt();
        }

        System.out.print("the age you entered are :");
        for(int k=0;k<age.length;k++)
        {
            System.out.print(age[k]+"\t");
        }
    }
}