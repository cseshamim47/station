#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n;
    cin >> n;
    int arr[n];
    for(int i = 0; i < n; i++) cin >> arr[i];
    sort(arr,arr+n);
    for(auto x : arr) cout << x << " ";
    cout << "\n";
    
    for(int i = n-1; i >= 2; i--)
    {

        int l = 0;
        int r = i-1;
        while(l < r)
        {
            int sum = arr[l]+arr[r];
            if(arr[i] == sum) cout << arr[l] << "+" << arr[r] << " = " << arr[i] << endl;
            if(arr[i] > sum) l++;
            else r--;
        }

        // for(int j = 0; j < i; j++)
        // {
        //     for(int k = j+1; k < i; k++)
        //     {
        //         int sum = arr[j]+arr[k];
        //         if(arr[i] == sum) cout << arr[j] << "+" << arr[k] << " = " << arr[i] << endl;
        //     }
        // }
    }     
}

// 1 2 3 4 5 6

// 9
// 5 32 1 7 10 50 19 21 2
