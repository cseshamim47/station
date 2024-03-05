// package Tests.JAVA;

import java.lang.*;
class HelloWorld{

static int getPeak(int []arr, int n)
{

    // if (n == 1)
    //     return 0;
    // if (arr[0] >= arr[1])
    //     return 0;
    // if (arr[n - 1] >= arr[n - 2])
    //     return n - 1;

    for(int i = 0; i < n; i++)
    {
        if (arr[i] >= arr[i + 1] && i == 0) 
        return arr[i];
        else if (i == n-1 && arr[i] >= arr[i - 1]) 
        return arr[i];
        else if (i != 0 && i != n-1 && arr[i] >= arr[i - 1] &&
            arr[i] >= arr[i + 1])
            return arr[i];
    }
    return 0;
}
public static void main (String [] args)
{
    int arr[]={2,9,10,7,3,5};
    int n = arr.length;

    System.out.println("Peak is :"+getPeak(arr,n));
}


}