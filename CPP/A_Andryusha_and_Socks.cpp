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
    unordered_map<int,int> mp;
    int cnt = 0;
    int ans = 0;
    for(int i = 0; i < n*2; i++)
    {
        int x;
        cin >> x;
        if(mp[x] == 1)
        {
            cnt--;
            continue;
        }
        else mp[x] = 1;

        cnt++;
        ans = max(ans,cnt);

        // cnt = max(cnt,sz);
    }
    cout << ans << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}