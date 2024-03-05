#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int a,b,c,d;
    cin >> a >> b >> c >> d;
    int sideA = min(a,b)+min(c,d);
    if(sideA == max(a,b) && sideA == max(c,d)) cout << "Yes" << endl;
    else cout << "No" << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}