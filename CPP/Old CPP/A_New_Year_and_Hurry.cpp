#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n, f;
    cin >> n >> f;

    int cnt = 0;
    for(int i = 1; i <= n; i++)
    {
        if(f + (i*5) <= 240)
        {
            f+=i*5;
            cnt++;
        }
    }
    cout << cnt << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}