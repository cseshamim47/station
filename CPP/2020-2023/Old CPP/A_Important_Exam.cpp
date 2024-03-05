#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n,m;
    cin >> n >> m;
    char arr[n][m];
    for(int i = 0; i < n; i++)
    {
        for (int j = 0; j < m; j++)
        {
            cin >> arr[i][j];   
        }
    }

    int numbers[m];
    for(int i = 0; i < m; i++) cin >> numbers[i];

    map<char,int> mp;

    int ans = 0;
    for(int i = 0; i < m; i++)
    {
        int cnt = 0;
        for (int j = 0; j < n; j++)
        {
            mp[arr[j][i]]++;
            cnt = max(cnt,mp[arr[j][i]]*numbers[i]);
        }
        ans += cnt;
        mp.clear();
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