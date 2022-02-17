#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int b,n;
    cin >> b >> n;
    vector<int> arr(n,0);
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }
    sort(arr.begin(),arr.end());
    int ans = INT_MAX;
    for(int i = 0; i < n; i++)
    {
        if(i+b-1<n)
        ans = min(ans,arr[i+b-1]-arr[i]);
        else break;
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