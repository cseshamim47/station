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
    int mn=INT_MAX,mx=INT_MIN;
    vector<int> v(n,0);
    for(int i = 0; i < n; i++) 
    {
        cin >> v[i];
        mn = min(mn,v[i]);
        mx = max(mx,v[i]);
    }
    cout << mx-mn<< endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}