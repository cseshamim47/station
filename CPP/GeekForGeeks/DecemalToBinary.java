package day_7;

public class DecemalToBinary {


    public static int dM(int decemal)
    {
        int binary =0;
        int rd =0;
        int i=1;
        while (decemal>0)
        {
            rd=decemal%2; 
            binary= binary+(rd*i); 
            decemal=decemal/2;
            i *= 10;
        }
        return binary;
    }

    public static void main(String[] args) {

        //     int n = 5;
        //     int i = 0;
        //     int[] arr= new int[32];
        //     while (n != 0) {
        //         arr[i] = n % 2;
        //         n = n / 2;
        //         i++;
        //     }
        //    for(int j=i-1;j>=0;j--)
        // {
        //     System.out.print(arr[j] + " ");
        // }
        System.out.println(dM(5));
    }

}