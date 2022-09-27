#include <bits/stdc++.h>
using namespace std;

const int N = 1e5;

bool vis[N];
vector<int> adj[N];
int level[N];

void bfs(int source)
{
    vis[source] = true;
    level[source] = 0;
    queue<int> q;
    q.push(source);

    while(!q.empty())
    {
        int curVartex = q.front();
        q.pop();
        cout << curVartex << " ";

        for(auto child : adj[curVartex])
        {
            if(vis[child]) continue;
            level[child] = level[curVartex]+1;
            q.push(child);
            vis[child] = true;
        }
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

    bfs(1);
    cout << endl;
    for(int i = 1; i <= vertex; i++)
    {
        cout << i << " : " << level[i] << endl;
    }

   

    
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
