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
    int cnt2 = 0;
    int cnt3 = 0;
    int cn = n;
    while(true)
    {
        if(cn%2 == 0)
        {
            cnt2++;
            cn/=2;
        }else if(cn%3 == 0)
        {
            cnt3++;
            cn/=3;
        }else break;
    }

    if(cn > 1 || cnt2>cnt3) cout << -1 << endl;
    else if(cnt3 > cnt2)
    {
        cout << cnt3-cnt2+cnt3 << endl;
    }else cout << cnt2 << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}