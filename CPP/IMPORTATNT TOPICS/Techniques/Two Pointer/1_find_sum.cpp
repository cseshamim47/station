#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{
}
// given an array and x, find the sum of two values from the array equals to x. 
int main()
{
      //        Bismillah
    // w(t)
    
    int n,k;
    cin >> n >> k;
    int arr[n];
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }
    sort(arr,arr+n);
    int L = 0, R = n-1;
    bool True = false;
    while(L < R)
    {
        if(arr[L]+arr[R] == k)
        {
            True = true;
            break;
        }
        else if(arr[L] + arr[R] > k) R--;
        else L++; 
    }    
    if(True) cout << arr[L] << " " << arr[R] << endl;
    else cout << "No" << endl;
}