#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

const int N = 3000;

vector<int> adj[N];
bool vis[N];
int height[N];

void dfs(int vertex,int parent)
{
    // vis[vertex] = true;
    for(int child : adj[vertex])
    {
        if(child == parent) continue;
        dfs(child,vertex);
        height[vertex] = max(height[vertex],1+height[child]);
    }
}

void solve()
{
    int n;
    cin >> n;
    for(int i = 1; i <= n; i++)
    {
        int boss;
        cin >> boss;
        if(boss == -1) 
        {
            adj[i].push_back(0);
            adj[0].push_back(i);
        }else
        {
            adj[i].push_back(boss);
            adj[boss].push_back(i);
        }
    }
    dfs(0,-1);
    cout << height[0] << endl;
    

}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}