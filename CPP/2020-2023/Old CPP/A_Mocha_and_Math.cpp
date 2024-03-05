#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    int arr[n];
    int mn = INT_MAX;
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
        mn = min(mn,arr[i]);
    }
    int ans = 0;
    int r = n-1;
    
    for(int i = 0; i < n; i++)
    {
        arr[i] &= mn;
        mn = min(arr[i],mn);
    }
    for(int i = n-1; i >= 0; i--)
    {
      arr[i] &= mn;
      mn = min(arr[i],mn);
    }

    for(auto x : arr)
    {
        ans = max(x,ans);
    }
    cout << ans << endl;
}

int32_t main()
{
    w(t)
}