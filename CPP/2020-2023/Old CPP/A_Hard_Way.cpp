#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006


void solve()
{
    double a,b,c,d,e,f;
    cin >> a >> b >> c >> d >> e >> f;
    // a b
    // c d 
    // e f
    cout << fixed << setprecision(12);
    if((b==d && f < b) || (b==f && d < b) || (d==f && b < d))
    {
        if(b==d) cout << abs(a-c) << endl;
        else if(b==f) cout << abs(a-e) << endl;
        else cout << abs(c-e) << endl;
        return;
    }   
    cout << 0.0000000000 << endl;

}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}