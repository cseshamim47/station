#include <bits/stdc++.h>
using namespace std;

const int N = 1e3;
bool vis[N];
vector<int> adj[N];
vector<int> adjT[N]; /// transpose of graph
bool one;
stack<int> stk;
void dfs1(int vertex)
{
    vis[vertex] = true;
    for(auto child : adj[vertex])
    {
        if(vis[child]) continue;
        dfs1(child);
    }
    stk.push(vertex);
}
void dfs2(int vertex)
{
    cout << vertex << " ";
    vis[vertex] = true;
    for(auto child : adjT[vertex])
    {
        if(vis[child]) continue;
        dfs2(child);
    }
}


int main()
{
    int n, m, cnt = 0;
    cin >> n >> m;

    for(int i = 1; i <= m; i++) 
    {
        int u,v;
        cin >> u >> v;
        adj[u].push_back(v);
        adjT[v].push_back(u);
    }
    for(int i = 1; i <= n; i++)
    {
        if(!vis[i])
        {
            dfs1(i);
        }
    }

    memset(vis,false,sizeof(vis));

    while(stk.empty() == false)
    {
        int node = stk.top();
        if(vis[node] == false)
        {
            dfs2(node);
            cnt++;
            cout << endl;
        }
        stk.pop();
    }

    cout << cnt << endl;
}


// 8 9
// 1 2
// 2 3
// 3 1
// 2 4 
// 4 5
// 5 6
// 6 7
// 7 5
// 7 8