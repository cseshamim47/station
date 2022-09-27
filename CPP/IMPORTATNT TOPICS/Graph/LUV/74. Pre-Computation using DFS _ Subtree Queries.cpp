#include <bits/stdc++.h>
using namespace std;

const int N = 1e5;

bool vis[N];
vector<int> adj[N];
int sum[N];
int even[N];

void dfs(int parent)
{
    // cout << parent << " ";
    // cout << endl;
    vis[parent] = true;
    sum[parent] = parent;
    if(parent%2 == 0) even[parent]++;
    for(auto child : adj[parent])
    {
        if(vis[child]) continue;

        dfs(child);
        sum[parent] += sum[child];
        even[parent] += even[child];
    }

    

}

int main()
{
    int vertex,edge;
    cin >> vertex >> edge;
    for(int i = 0; i < edge; i++)
    {
        int u,v;
        cin >> u >> v;
        adj[u].push_back(v);
        adj[v].push_back(u);
    }

    dfs(1);

    for(int i = 1; i <= vertex; i++) cout << sum[i] << " ";
    cout << endl;

    for(int i = 1; i <= vertex; i++) cout << even[i] << " ";
    cout << endl;
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
