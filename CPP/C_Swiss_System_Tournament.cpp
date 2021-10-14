#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

/* bool cmp(pair<int,int> &a, pair<int,int> &b)
{
    if(a.second == b.second) return a.first < b.first;
    return a.second > b.second;
} */

void solve()
{
    int n,m;
    cin >> n >> m;

    char ch[n*2][m];
    vector<pair<int,int>> v;
    
    for(int i = 0; i < n*2; i++) v.push_back({i,0});

    for(int i = 0; i < n*2; i++)
    {
        for(int j = 0; j < m; j++)
        {
            cin >> ch[i][j];
        }
    }

    for(int j = 0; j < m; j++)
    {
        vector<pair<int,int>> tmp;
        for(int i = 0; i < n*2; i++)
        {
            auto f = v[i], s = v[i+1];
            i++;
            char p1 = ch[f.first][j],p2 = ch[s.first][j];
            
            if(p1 == 'G' && p2 == 'C') f.second++;
            else if(p1 == 'C' && p2 == 'G') s.second++;
            else if(p1 == 'C' && p2 == 'P') f.second++;
            else if(p1 == 'P' && p2 == 'C') s.second++;
            else if(p1 == 'P' && p2 == 'G') f.second++;
            else if(p1 == 'G' && p2 == 'P') s.second++;
            tmp.push_back(f);
            tmp.push_back(s);
        }
        v = tmp;
        sort(v.begin(),v.end(),[](auto &a, auto &b)
        {
            if(a.second == b.second) return a.first < b.first;
            return a.second > b.second;
        });
    }

    for(auto pr : v) cout << pr.first+1 << endl;


}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}