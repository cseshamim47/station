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
    if(n & 1) cout << -(n+1)/2 << endl;
    else cout << n/2 << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();    
}