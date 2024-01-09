// In the name of ALLAH
// cseshamim47
// 01-01-2023 03:08:58

#include <bits/stdc++.h>
#include <ext/pb_ds/assoc_container.hpp>
using namespace std;
using namespace __gnu_pbds;

#define int long long
#define ll unsigned long long
#define uset tree<int, null_type, less_equal<int>, rb_tree_tag, tree_order_statistics_node_update >  /// cout<<*os.find_by_order(val)<<endl; // k-th element it /// less_equal = multiset, less = set, greater_equal = multiset decreasing, greater = set decreaseing ///  cout<<os.order_of_key(val)<<endl;  // strictly smaller or greater
#define fo(i,n) for(i=0;i<n;i++)
#define Fo(i,k,n) for(i=k;k<n?i<n:i>n;k<n?i+=1:i-=1)
#define YES printf("YES\n")
#define NO printf("NO\n")
#define MONE printf("-1\n")
#define vi vector<int>
#define vii vector<pair<int,int>>
#define pii pair<int,int>
#define pb push_back
#define pf push_front
#define F first
#define S second
#define clr(x,y) memset(x, y, sizeof(x))
#define deb(x) cout << #x << "=" << x << endl
#define deb2(x, y) cout << #x << "=" << x << "," << #y << "=" << y << endl
#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define allg(x) x.begin(),x.end(),greater<int>()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define nl printf("\n");
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
template<typename T> istream& operator>>(istream& in, vector<T>& a) {for(auto &x : a) in >> x; return in;};
template<typename T> ostream& operator<<(ostream& out, vector<T>& a) {for(auto &x : a) out << x << ' ';nl; return out;};
template<typename T1, typename T2> ostream& operator<<(ostream& out, const pair<T1, T2>& x) {return out << x.F << ' ' << x.S  << endl;}
template<typename T1, typename T2> istream& operator>>(istream& in, pair<T1, T2>& x) {return in >> x.F >> x.S;}
template<typename T> void Unique(T &a) {a.erase(unique(a.begin(), a.end()), a.end());}
#define INF 1e9

int g;
struct{
    template<class T> operator T() {
        T x;
        cin >> x;
        return x;
    }
}in;

int dx[] = {-1, 1, 0, 0,-1,-1, 1,1};
int dy[] = { 0, 0,-1, 1,-1, 1,-1,1};

void f()
{}

int Case;

const int N = 1e5+10;
int level[N];
vector<int> adj[N];
int t[100][N];
int n;
void dfs(int vertex,int parent)
{
    t[0][vertex] = parent;   
    for(auto child : adj[vertex])
    {
        if(child == parent) continue;
        level[child] = level[vertex] + 1;
        dfs(child,vertex);
    }
}

void init()
{
    int p = log2(n);
    for(int i = 0; i <= p; i++)
    {
        for(int j = 1; j <= n; j++)
        {
            t[i][j] = -1;
        }
    }

    dfs(1,-1);
    
    for(int i = 1; i <= p; i++)
    {
        for(int j = 1; j <= n; j++)
        {
            int prevPar = t[i-1][j];
            if(prevPar != -1)
            {
                t[i][j] = t[i-1][prevPar];
            }
        }
    }
}

int LCA(int u, int v)
{
    if(level[u] < level[v]) swap(u,v);
    if(level[u]-level[v] > 0)
    for(int l = log2(level[u]-level[v]); level[u] > level[v]; l = log2(level[u]-level[v]))
    {
        u = t[l][u];
    }

    if(u == v) return u;
    int maxN = log2(n);
    for(int i = maxN; i >= 0; i--)
    {
        if(t[i][u] != -1 && t[i][u] != t[i][v])
        {
            u = t[i][u];
            v = t[i][v];
        }
    }

    return t[0][u];
    
}




void solve()
{
    int a=0,b=0,i=0,j=0,m=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    for(int i = 0; i < N; i++)
    {
        adj[i].clear();
        level[i] = 0;
    }
    n = in;
    for(int i = 1; i <= n; i++)
    {
        m = in;
        fo(j,m)
        {
            k = in;
            adj[i].push_back(k);
            adj[k].push_back(i);
        }
    }
    q = in;
    init();
    printf("Case %lld:\n",++Case);
    while(q--)
    {
        int u, v;
        cin >> u >> v;
    // YES;
        cout << LCA(u,v) << endl;
    }

}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    w(t)
    // solve();
    // f();
}