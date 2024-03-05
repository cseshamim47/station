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
    int n;
    cin >> n;
    int cn = n;
    int ans = 0;
    double cnt = 1;
    while(cnt > 0.5)
    {
        cnt *= (cn*1.00/n);
        cn--;
        ans++;
    } 
    cout << "Case " << ++Case << ": " << ans-1 << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    // cout << endl;
    //solve();
}