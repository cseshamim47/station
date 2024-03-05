#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006
const int N = 1e5+10;
vector<int> adj[N];

int depth[N];
int height[N];

void dfs(int vertex,int parent = 0)
{
    for(auto child : adj[vertex])
    {
        if(child == parent) continue;
        depth[child] = 1 + depth[vertex];
        dfs(child,vertex);
        height[vertex] = max(height[vertex],1+height[child]);
    }
}

int32_t main()
{
    int v;
    cin >> v;
    for(int i = 1; i < v; i++)
    {
        int a,b;
        cin >> a >> b;
        adj[a].push_back(b);
        adj[b].push_back(a);
    }
    dfs(1); 

    for(int i = 1; i <= v; i++)
    {
        cout << i << " " << depth[i] << " " << height[i] << endl;
    }
}