#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n, f;
    cin >> n >> f;
    int arr[n];
    for (int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }

    sort(arr,arr+n);
    int g;
    cin >> g;
    int ans = 0;
    for(int i = 0; i < g; i++)
    {
        if(i >= n) ans -= f;
        else
        ans += arr[i];
    }

    cout << ans << endl;
    
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}