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
    if(n & 1) cout << "YES" << endl;
    else
    {
        double x = log2(n);
        int y = (int)x;
        if(x==y) cout << "NO" << endl;
        else cout << "YES" << endl; 
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}