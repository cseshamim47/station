#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    int arr[n];
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }
    int k;
    cin >> k;
    int cnt = 0;
    sort(arr,arr+n);
    for(int i = 0; i < n; i++)
    {
        int l = i+1;
        int r = n-1;
        while(l < r)
        {
            int sum = arr[i]+arr[l]+arr[r];
            if(sum == k) cnt++;
            if(sum < k) l++;
            else r--;
        }
    }
    cout << cnt << endl;
}

int32_t main()
{
      //        Bismillah
    w(t)
    
}