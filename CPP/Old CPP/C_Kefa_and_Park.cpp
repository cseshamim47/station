#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

const int N = 1e5+10;

bool vis[N];
bool cats[N];
vector<int> adj[N];
int cc;
int ans;
// int cnt;

void dfs(int vertex,int cnt,int parent)
{
    if(cats[vertex]) cnt++;
    else cnt = 0;
    // cout << cc << " - " << cnt << endl;
    vis[vertex] = true;

    if(cnt > cc) 
    {
        cnt = 0;
        return;
    }

    
    int flag = 1;
    for(auto child : adj[vertex])
    {
        if(vis[child]) continue;
        // cout << vertex << " " << child << endl;
        if(parent != child)
        {
            flag = 0;
            dfs(child,cnt,vertex);
        }
    }

    // if(flag)
    // cout << vertex << " "; 
    if(adj[vertex].size() == 1 && cnt <= cc && flag == 1) ans++;
}

void solve()
{
    int v;
    cin >> v >> cc;

    for(int i = 1; i <= v; i++)
    {
        cin >> cats[i];
    }

    for (int i = 1; i < v; i++)
    {
        int a,b;
        cin >> a >> b;
        adj[a].push_back(b);
        adj[b].push_back(a);
    }
    dfs(1,0,0);

    cout << ans << endl;
    
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}