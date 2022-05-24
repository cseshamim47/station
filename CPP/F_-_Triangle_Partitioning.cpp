#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

int Case;
void solve()
{
    double a,b,c,ratio;
    cin >> a >> b >> c >> ratio;
    double ans = sqrt(ratio/(ratio+1));
    ans *= a;
    cout << "Case " << ++Case << ": "; 
    cout << fixed << setprecision(10) << ans << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}