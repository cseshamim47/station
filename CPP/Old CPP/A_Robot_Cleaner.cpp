#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n,m,sr,sc,rr,rc;
    cin >> n >> m >> sr >> sc >> rr >> rc;
    int dc = 1,dr = 1;
    int cnt = 0;
    while(sr != rr && sc != rc)
    {
        if(sr+dr > n || sr+dr < 1) dr *= -1;
        if(sc+dc > m || sc+dc < 1) dc *= -1;
        sr+=dr;
        sc+=dc;
        cnt++;
    }
    cout << cnt << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}