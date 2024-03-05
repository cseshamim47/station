#include <bits/stdc++.h>
using namespace std;
 
// Recursive function to print all possible subarrays 
// for given array
int cnt;
void printSubArrays(vector<int> arr, int start, int end)
{     
    // Stop if we have reached the end of the array    
    if (end == arr.size())
        return;
       
    // Increment the end point and start from 0
    else if (start > end)
        printSubArrays(arr, 0, end + 1);
           
    // Print the subarray and increment the starting point
    else
    {
        // cout << end-start+1 << endl;
        cnt += (end-start+1);
        // cout << "[";
        for (int i = start; i < end; i++){
            if(arr[i] == 0) cnt+=1;
            // cout << arr[i] << ", ";
        }
        if(arr[end] == 0)cnt++;
        // cout << arr[end] << "]" << endl;
        printSubArrays(arr, start + 1, end);
    }
     
    return;
}
 
int main()
{
   int t;
   cin >> t;
   while(t--)
   {
       int n;
       cin >> n;
       vector<int> v;
       for(int i = 0; i < n; i++) 
       {
           int x;
           cin>>x;
           v.push_back(x);
       }
        vector<int> arr = v;
        printSubArrays(arr, 0, 0);
        cout << cnt << endl;
        cnt = 0;
   }
   return 0;
}