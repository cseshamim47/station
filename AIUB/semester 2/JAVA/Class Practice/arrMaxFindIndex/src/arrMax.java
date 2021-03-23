public class arrMax
{
    public static void main(String [] args)
    {
        int arr[] = new int[10];
        arr[0] = 11;
        arr[1] = 149;
        arr[2] = 7;
        arr[3] = 9;
        arr[4] = 12;
        arr[5] = 143;
        arr[6] = 407;
        arr[7] = 32;
        arr[8] = 5;
        arr[9] = 10;

        int max = -100000;
        int index = -1;
        for(int i = 0; i < arr.length; i++)
        {
            if(max<arr[i])
            {
                max = arr[i];
                index = i;
            }
        }
        System.out.println("Index : " +index);
        System.out.println("Max value : " +max);

    }
}