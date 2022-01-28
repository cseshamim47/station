#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

const int N = 1000;
vector<pair<int,int>> adj[N];


int dfs(int node,int parent)
{
    if(node == 1 && parent != -1) return 0;
    for(auto child : adj[node])
    {
        int to = child.first;
        int w = child.second;
        if(to != parent)
        {
            // cout << w << " going to : " << to << " parent : " << node << endl;
            return w + dfs(to,node);
        }
    }
    return 0;
}

void solve()
{
    int n;
    cin >> n;
    for(int i = 0; i < n; i++)
    {
        int x,y,w;
        cin >> x >> y >> w;
        adj[x].push_back({y,0});
        adj[y].push_back({x,w}); 
    }
    int res = dfs(1,-1);
    // cout << res << endl;

    // printf("\n");
    // for(int i = 1; i <= n; i++)
    // {
    //     for(int j = 0; j < adj[i].size(); j++)
    //     {
    //         cout << i << " " <<  adj[i][j].first << " " << adj[i][j].second << endl;
    //     }
    //     printf("\n");
    // }

    reverse(adj[1].begin(),adj[1].end());

    // printf(" after reverse : \n");
    // for(int i = 1; i <= n; i++)
    // {
    //     for(int j = 0; j < adj[i].size(); j++)
    //     {
    //         cout << i << " " <<  adj[i][j].first << " " << adj[i][j].second << endl;
    //     }
    //     printf("\n");
    // }

      res = min(dfs(1,-1),res);
        cout << res << endl;


    
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}