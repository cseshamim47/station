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
    bool even = true;
    bool odd = true;

    while(n--)
    {
        int x;
        cin >> x;
        if(x%2 == 0) odd = false;
        else even = false;
    }
    if(even or odd) cout << "YES" << endl;
    else cout << "NO" << endl;

}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    // solve();
}