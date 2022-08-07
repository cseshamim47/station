#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int a,b;
    cin >> a >> b;
    int ans = a*b;
    
    if(ans % 3 == 0) cout << ans/3 << endl;
    else cout << (ans/3) + 1 << endl;
    
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}