#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int l,r,a;
    cin >> l >> r >> a;

    int cnt = 0;
    int ans = 0;
    
    if(r%a == 0)
    {
        r--;
        if(r < l)
        {
            ans = (l/a);
        }else 
        ans = max(((r/a)+(r%a)), ((r+1)/a));
    }else
    {
        int x = r/a;
        x *= a;
        x--;
        if(x < l) x = l;
        ans = max(((r/a)+(r%a)), ((x/a)+(x%a)));

        // ans = max()
    }
    cout << ans << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}