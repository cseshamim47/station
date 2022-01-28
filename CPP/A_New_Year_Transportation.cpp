#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 100006

const int N = 3*1e4+1000;

vector<int> graph[N];

bool vis[N];

void dfs(int vertex,int v)
{
    // cout << vertex << endl;
    if(vis[vertex]) return;
    vis[vertex] = true;
    // getchar();
    // cout << vertex << "  " << graph[vertex].size() << endl;
    for(auto x : graph[vertex])
    {
        // cout << vertex << " " << x << endl;
        dfs(x,v);
    }
    // cout << 's' << endl;
    // return;
}

void solve()
{
    int v,wannaGo;
    cin >> v >> wannaGo;

    int arr[v];
    for(int i = 1; i < v; i++)
    {
        cin >> arr[i];
    }
    for(int i = 1; i < v; i++)
    {
        graph[i].push_back(i+arr[i]);
    }

    dfs(1,v);
    if(vis[wannaGo]) cout << "YES" << endl;
    else cout << "NO" << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}