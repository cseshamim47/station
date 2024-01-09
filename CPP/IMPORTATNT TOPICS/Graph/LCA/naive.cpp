#include <bits/stdc++.h>
using namespace std;
#define all(x) x.begin(),x.end()

const int N = 1e5;
int parent[N];
vector<int> adj[N];
int level[N];

void dfs(int node, int par)
{
    parent[node] = par;
    for(auto child : adj[node])
    {
        if(child != par)
        {
            level[child] = level[node] + 1;
            dfs(child,node);
        }
    }
}

vector<int> path(int node)
{
    vector<int> v;
    while(node != -1)
    {
        v.push_back(node);
        node = parent[node];
    }
    return v;
}

void myStyle(int u, int v)
{
    auto pathU = path(u);
    auto pathV = path(v);

    reverse(all(pathU));
    reverse(all(pathV));

    int minPath = min(pathU.size(),pathV.size());
    int lca = -1;
    for(int i = 0; i < minPath; i++)
    {
        if(pathU[i] == pathV[i])
        {
            lca = pathU[i]; 
        }else break;
    }

    cout << lca << endl;
}

void levelStyle(int u, int v)
{
    int a = level[u];
    int b = level[v];
    if(a < b)
    {
        swap(a,b);
        swap(u,v);
    }

    int climb = a-b;
    while(climb--)
    {
        u = parent[u];
    }

    while(u != v) 
    {
        u = parent[u];
        v = parent[v];
    }

    cout << u << endl;
}

int main()  // O(n) 
{
    
    int n;
    cin >> n;
    int u,v;
    for(int i = 0; i < n-1; i++)
    {
        cin >> u >> v;
        adj[u].push_back(v);
        adj[v].push_back(u);
    }
    cin >> u >> v;
    dfs(1,-1);
    // myStyle(u,v);
    levelStyle(u,v);
}

/* 
17
1 2
1 3
2 4
2 5
5 12
5 13
4 6
4 7
6 8
8 9
7 14
7 15
15 16
15 17
3 10
3 11
*/
