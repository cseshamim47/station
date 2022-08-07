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
    vector<vector<int>> v;
    v.resize(n,vector<int>());
    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < 3; j++)
        {
            int x;
            cin >> x;
            v[i].push_back(x);
            if(i != 0)
            v[0][j] += v[i][j];
        }
    }
    bool ans = true;
    for(auto x : v[0]) if(x != 0) ans = false;
    if(!ans) cout << "NO" << endl;
    else cout << "YES" << endl;

}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}