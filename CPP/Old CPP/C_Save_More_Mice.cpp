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
    int cat = 0;
    vector<pair<int,int>> v;
    for(int i = 0; i < m; i++)
    {
        int x;
        cin >> x;
        v.push_back({x,n-x});
    }
    sort(v.rbegin(),v.rend());
    int idx = 0;
    int cnt = 0;
    int catCost = 0;
    while(cat<n && idx < m)
    {
        if(cat < v[idx].first)
        {
            cnt++;
            cat+=v[idx].second;
            idx++;
        }else break;
        // cout << cat << " " << cnt << endl;
        // getchar();
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
