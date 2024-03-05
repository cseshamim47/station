#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 100006
int feel = 1;

void solve()
{
    int n,m,t;
    cin >> n >> m >> t;

    int col = ceil((double)t/n);
    int row = t - (col-1)*n;

    int ans = m * (row-1) + col;
    // cout << row << " " << col << endl;
    cout << ans << endl;

}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}