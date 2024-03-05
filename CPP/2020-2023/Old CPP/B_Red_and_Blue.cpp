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
    int a[n];
    for(int i = 0; i < n; i++) cin >> a[i];

    int m;
    cin >> m;
    int b[m];
    for(int i = 0; i < m; i++) cin >> b[i];

    int cnta = 0;
    int cntb = 0;
    int cnt = 0;
    for(int i = 0; i < n; i++)
    {
        cnt += a[i];
        cnta = max(cnt,cnta);
    }

    cnt = 0;
    for(int i = 0; i < m; i++)
    {
        cnt += b[i];
        cntb = max(cnt,cntb);
    }
    
    int ans = max((int)0,cnta+cntb);
    cout << ans << endl;
    
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}