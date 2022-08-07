#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

const int N = 2*1e5+10;

vector<int> adj[N];
int d1[N];
int d2[N];

void dfs(int vertex,int parent,int depth,int *d)
{
    d[vertex] = depth;

    for(auto child : adj[vertex])
    {
        if(child != parent)
        {
            dfs(child,vertex,depth+1,d);
        }
    }
}


void solve()
{
    int v, b;
    cin >> v >> b;

    for(int i = 0; i < v-1; i++)
    {
        int x,y;
        cin >> x >> y;
        adj[x].push_back(y);
        adj[y].push_back(x);
    }

    dfs(1,0,0,d1);
    dfs(b,0,0,d2);

    int ans = 0;
    for(int i = 1; i <= v; i++)
    {
        if(d2[i] < d1[i]) 
        {
            ans = max(ans,d1[i]);
        }
    }
    ans *= 2;
    cout << ans << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}