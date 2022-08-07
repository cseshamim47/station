#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006
bool cmp(pair<int,pair<int,int>> a, pair<int,pair<int,int>> b)
{
    int x = a.second.first;
    int y = b.second.first;
    return x < y;
}

void solve()
{
    int n,m;
    cin >> n >> m;
    vector<pair<int,pair<int,int>>> v;

    for(int i = 1; i <= m; i++)
    {
        int p,w;
        cin >> p >> w;
        v.push_back({p,{w,i}});
    }

    sort(v.begin(),v.end(),cmp);
    int y = (2*n)-1;
    int sum = 0;
    // cout << v[y].first << v[y].second.first << " " << v[y].second.second << endl; 
    vector<pair<int,int>> ans;
    int cn = n;
    for(auto x : v)
    {
        if(n == 0) break;
        sum += (x.second.first+v[y].second.first);
        ans.push_back({x.first,x.second.second});
        ans.push_back({v[y].first,v[y].second.second});
        n--;
        y--;
        // cout << x.second.second << " " << x.first << " " << x.second.first << endl;
    }

    sort(ans.begin(),ans.end());
    cout << sum << endl;
    y = (2*cn)-1;
    for(auto x : ans)
    {
        if(cn == 0) break;
        cout << x.second << " " << ans[y].second << endl;
        y--;
        cn--;
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}