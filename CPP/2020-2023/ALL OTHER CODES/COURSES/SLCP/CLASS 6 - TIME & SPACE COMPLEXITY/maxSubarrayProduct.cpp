#include <bits/stdc++.h>
using namespace std;

int maxSubarrayProduct(int arr[], int n)
{
    int max_ending_here = 1;
    int min_ending_here = 1;
    int max_so_far = 0;

    for(int i = 0; i < n; i++)
    {
        if(arr[i] > 0)
        {
            max_ending_here = max_ending_here*arr[i];
            min_ending_here = min(min_ending_here*arr[i],1);
        }else if(arr[i] == 0)
        {
            max_ending_here = 1;
            min_ending_here = 0;
        }else 
        {
            int temp = max_ending_here;
            max_ending_here = max(min_ending_here*arr[i],1); 
            min_ending_here = temp*arr[i]; 
        }

        max_so_far = max(max_ending_here,max_so_far); // 2
    }
    return max_so_far;
}

int main()
{
    int arr[6] = {-1,2,0,-4,-3,5};
    cout << maxSubarrayProduct(arr,6) << endl;
}