#include <bits/stdc++.h>
using namespace std;

#define fo(i,n) for(i=0;i<n;i++)
#define deb(x) cout << #x << "=" << x << endl
#define deb2(x, y) cout << #x << "=" << x << "," << #y << "=" << y << endl
#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 200005

struct{
    template<class T> operator T() {
        T x;
        cin >> x;
        return x;
    }
}in;

void fileInput()
{
    #ifndef ONLINE_JUDGE
        freopen("input.txt", "r", stdin);
        freopen("output.txt", "w", stdout);
    #endif
}

int gcd(int a, int b)
{
    if(!b) return a;
    return gcd(b,a%b);
}

void f()
{}
vector<int> graph[MAX];
map<int,int> parent;
vector<vector<int> > ans;
bool vis[MAX];
int root,idx=0;

void dfs(int vertex, int parent)
{
    ans[idx].push_back(vertex);
    vis[vertex] = true;
    for(auto child : graph[vertex])
    {
        if(vis[child]) continue;
        dfs(child,vertex);
        idx++;
        ans.push_back(vector<int>());
    }
}

void init()
{
    for(int i = 0; i < MAX; i++) graph[i].clear();
    for(int i = 0; i < ans.size(); i++) ans[i].clear();
    for(int i = 0; i < MAX; i++) vis[i] = false;
    root = 0;
    idx = 0;
    ans.clear();
}

void solve()
{
    int n;
    cin >> n;
    vector<int> v(n+10);
    init();
    for(int i = 1; i <= n; i++)
    {
        v[i] = in;
        if(i == v[i]) 
        {
            root = i;
            continue;
        }
        graph[v[i]].push_back(i);   
        graph[i].push_back(v[i]);   
    }

    int leafs = 0;

    ans.push_back(vector<int>());
    dfs(root,0);

    for(int i = 0; i < ans.size(); i++)
    {
        if(ans[i].size() == 0)
        {
            continue;
        }
        leafs++;
    }
    cout << leafs << endl;

    for(int i = 0; i < ans.size(); i++)
    {
        if(ans[i].size() == 0)
        {
            continue;
        }
        cout << ans[i].size() << endl;
        for(auto x : ans[i]) cout << x << " ";
        printf("\n");
    }
    
    // init();
    // printf("\n");
    
}


int Case;
vector<int> rasta;
vector<int> find_path(int vertex)
{
    while(vertex != -1 and !vis[vertex])
    {
        rasta.push_back(vertex);
        vis[vertex] = true;
        // cout << vertex << " ";
        // find_path(parent[vertex]);
        vertex = parent[vertex];
    }
    reverse(all(rasta));
    // cout << endl;
    return rasta;
}

void sol2()
{
    int t;
    cin >> t;
    while(t--)
    {
        int i,j,m,n;
        n = in;
        vector<int> v(n);
        vector<int> g[n+1];
        fo(i,n)
        {
            v[i] = in;
            if(i+1 == v[i])
            {
                root = v[i];
                continue;
            }
            g[v[i]].push_back(i);
            // graph[v[i]].push_back(i+1);
            parent[i+1] = v[i]; 
        }

        parent[root] = -1;

        vector<int> leaf;

        for(int i = 1; i <= n; i++)
        {
            if(g[i].size() == 0) leaf.push_back(i);
            
        }

        cout << leaf.size() << endl;

        for(auto l : leaf)
        {
            vector<int> mm = find_path(l);
            cout << mm.size() << endl;
            for(auto x : mm) cout << x << " ";
            printf("\n");
            rasta.clear();
        }

        parent.clear();
        for(int i = 0; i <= n; i++) vis[i] = false;
        printf("\n");
    }
}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    w(t)
    // sol2();
    // solve();
    // f();
}