#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int k;
    cin >> k;
    vector<int> v(12,0);
    for(int i = 0; i < 12; i++) cin >> v[i];
    sort(v.begin(),v.end(),greater<int>());
    int ans = 0;
    int cnt = 0;
    for(int i = 0; i < 12; i++)
    {
        if(ans < k)
        {
            ans += v[i];
            cnt++;
        }else break;
    }
    if(ans < k) cnt = -1;
    cout << cnt << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}