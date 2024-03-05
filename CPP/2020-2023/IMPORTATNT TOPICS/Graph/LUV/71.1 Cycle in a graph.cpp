#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

const int N = 1e5+10;
vector<int> graph[N];

bool vis[N];


bool dfs(int vertex,int parent)
{
    bool hasCycle = false;
    vis[vertex] = true;
    for(auto child : graph[vertex])
    {
        if(vis[child] && child == parent) continue;
        if(vis[child]) return true;
        hasCycle |= dfs(child,vertex);
    }
    return hasCycle;
}

void solve()
{
    int v,e;
    cin >> v >> e;

    for(int i = 0; i < e; i++)
    {
        int a,b;
        cin >> a >> b;
        graph[a].push_back(b);
        graph[b].push_back(a);
    }
    
    for(int i = 1; i <= v; i++)
    {
        if(vis[i]) continue;
        if(dfs(i,-1))
        {
            cout << "It Has cycle" << endl;
            return;
        }
    }

        cout << "No cycle" << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}

/* 

8 6
1 2
2 3
2 4
3 5
6 7

4 5

op:
3
1 2 3 5 4
6 7
8 


*/