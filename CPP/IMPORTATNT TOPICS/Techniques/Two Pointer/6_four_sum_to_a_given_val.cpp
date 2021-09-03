#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{}

int main()
{
      //        Bismillah
    // w(t)
    int n , k;
    cin >> n >> k;
    int arr[n];
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }
    sort(arr,arr+n);
    bool tripletFound = false;
    for(int i = 0; i < n; i++)
    {
        for(int j = i+1; j < n; j++)
        {
            int l = j+1;
            int r = n-1;
            while(l < r)
            {
                int sum = arr[i]+arr[j]+arr[l]+arr[r];
                if(sum == k)
                {
                    tripletFound = true;
                    cout << arr[i] << "+" << arr[j] << "+" << arr[l] << "+" << arr[r] << " : " << sum << endl; 
                }
                if(sum < k) l++;
                else r--;
            }
        }
    }
    if(!tripletFound) cout << "Not found" << endl; 
}

// 8 8
// 2 2 4 4 0 7 1 0

// 10 16    
// 2 2 4 4 6 6 8 8 0 0