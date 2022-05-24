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
    int cnt = 0;

    
    cnt = n;
    while(n >= 10)
    {
        int x = n/10;
        int y = n%10;
        cnt += x;
        n = x + y;
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

// 9876+988+99+10+1