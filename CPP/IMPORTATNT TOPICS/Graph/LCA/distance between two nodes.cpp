#include <bits/stdc++.h>
using namespace std;
#define all(x) x.begin(),x.end()

const int N = 1e5;
int LCA[N][100];
vector<int> adj[N];
int level[N];
int n;
int maxN;

void dfs(int node, int par)
{
    LCA[node][0] = par;
    for(auto child : adj[node])
    {
        if(child != par)
        {
            level[child] = level[node] + 1;
            dfs(child,node);
        }
    }
}

void init() // Build --> O(Nlog(N))
{
    maxN = log2(n);
    for(int i = 1; i <= n; i++)
    {
        for(int j = 1; j <= maxN; j++)
        {
            LCA[i][j] = -1;
        }
    }

    for(int j = 1; j <= maxN; j++)
    {
        for(int i = 1; i <= n; i++)
        {
            int prevNthParent = LCA[i][j-1]; /// 2^j-1 th parent of i 
            if(prevNthParent == -1) continue;
            LCA[i][j] = LCA[prevNthParent][j-1];           
        }
    }
}

int getLCA(int u, int v) /// binary lifting -> O(Log(N));
{

    int a = level[u];
    int b = level[v];
    if(a < b)
    {
        swap(a,b);
        swap(u,v);
    }

    int climb = a-b;
    while(climb > 0)
    {
        int maxPow = log2(climb);
        climb -= (1<<maxPow);
        u = LCA[u][maxPow];
    }
    
    if(u == v) return u;

    for(int j = maxN; j >= 0; j--)
    {
        if(LCA[u][j] != -1 && LCA[u][j] != LCA[v][j])
        {
            u = LCA[u][j];
            v = LCA[v][j];
        }
    }

    return LCA[u][0];
}

int main()   
{
    
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
    init();

    int lca = getLCA(u,v);
    cout << level[u]+level[v]-2*level[lca] << endl;
    // cout << getLCA(u,v);
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
