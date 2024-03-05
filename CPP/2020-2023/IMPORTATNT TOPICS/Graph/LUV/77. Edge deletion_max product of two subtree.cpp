#include <bits/stdc++.h>
using namespace std;

const int N = 1e5;

bool vis[N];
vector<int> adj[N];
int sum[N];
int val[N];

void dfs(int parent)
{
     vis[parent] = true;
     sum[parent] = val[parent];
     for(auto child : adj[parent])
     {
        if(vis[child]) continue;
        dfs(child);
        sum[parent] += sum[child];
     }

}

int main()
{
    int vertex,edge;
    cin >> vertex >> edge;
    for(int i = 1; i <= vertex; i++) cin >> val[i];

    for(int i = 0; i < edge; i++)
    {
        int u,v;
        cin >> u >> v;
        adj[u].push_back(v);
        adj[v].push_back(u);
    }

    dfs(1);
    int total = sum[1];
    int maxProduct = 1;
    for(int i = 2; i <= vertex; i++)
    {
        maxProduct = max(maxProduct,sum[i]*(total-sum[i]));
    }
    cout << maxProduct << endl;

    
}

// 13 12
// 1 2
// 1 3 
// 1 13
// 2 5
// 5 6
// 5 7
// 5 8
// 8 12
// 3 4
// 4 9
// 4 10
// 10 11
