#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{
    ll x;
    while(cin >> x)
    {
        ll pm = 1, sum = 0,m = 0;
        ll f = 0,mf = 1;
        if(x == -1) break;
        if(x == 0) cout << 0 << " " << 1 << endl;
        else if(x == 1) cout << 1 << " " << 2 << endl;
        else
        {
            for(int i = 2; i <= x; i++)
            {
                m = pm+f+mf;
                f = pm;
                pm = m;
                // cout << m << " " << f << endl;
            }
            sum = m+f+1;
            cout << m << " " << sum << endl;
        } 
    }
}

int main()
{
      //        Bismillah
    // w(t)
    solve();    
}