#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int d,a,b;
    cin >> d >> a >> b;
    // int x = min(a,b);
    
    while(a--)
    {
        int p = d;
        if(d <= 0) break;
        d = d/2 + 10;
        if(p<=d)
        {
            d = p;
            break;
        } 
    }
    d -= (b*10);
    if(d <= 0) cout << "YES" << endl;
    else cout << "NO" << endl;
    // cout << d << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}