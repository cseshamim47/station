#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n, l;
    cin >> n >> l;
    double arr[n];
    for(int i = 0; i < n; i++) cin >> arr[i];

    sort(arr,arr+n);
    double mx = arr[0]-0;

    for (int i = 1; i < n; i++)
    {
        mx = max((arr[i]-arr[i-1])/2,mx);
    }
    mx = max(l-arr[n-1],mx);
    cout << fixed << setprecision(12) << mx << endl;
    
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}