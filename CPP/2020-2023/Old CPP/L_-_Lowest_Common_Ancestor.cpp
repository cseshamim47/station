#include <bits/stdc++.h>
typedef double          D;
typedef long long int   LL;
typedef long double     LD;
#define OR              ||
#define AND             &&
#define nl              '\n'
#define ff              first
#define ss              second
#define S               string
#define inf             INT_MAX
#define SQR(a)          (a) * (a)
#define pb              push_back
#define GCD(a, b)       __gcd(a, b)
#define PI              2.0*acos(0.0)
#define pii             pair<int,int>
#define pll             pair<long long,long long>
#define LCM(a, b)       (a * b) / GCD(a, b)
#define mem(a,b)        memset(a,b,sizeof(a))
#define srtv(v)         sort(v.begin(),v.end())
#define Rep(i,a,b)      for(int i = a; i <= b; i++)
#define rep(i,a,b)      for(int i = a; i >= b; i--)
#define boost           ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL)
#define inout           freopen("input.txt","r",stdin);freopen("output.txt","w",stdout)

#define si(x)           scanf("%d",&x)
#define pi(x)           printf("%d",x)
#define sss(str)         scanf("%s",str)
#define pl(x)           printf("%lld",x)
#define sl(x)           scanf("%lld",&x)
#define sii(x,y)        scanf("%d %d",&x,&y)
#define sll(x,y)        scanf("%lld %lld",&x,&y)
#define siii(x,y,z)     scanf("%d %d %d",&x,&y,&z)
#define slll(x,y,z)     scanf("%lld %lld %lld",&x,&y,&z)
using namespace std;

const int N=1e5+5;
const int lg=log2(N)+2;
vector<int> adj[N];
int t[N][50];
int n,level[N],root;

void dfs(int u,int p)
{
    t[u][0]=p;
    if(p==-1)
        level[u]=0;
    else
        level[u]=level[p]+1;
    for(auto i:adj[u])
    {
        if(i!=p)
        {
            dfs(i,u);
        }
    }
}

int Log2[N];
int log2(int n)
{
    return Log2[n];
}

void build()
{
    for(int i = 2; i < N ; i++)
    {
        Log2[i] = Log2[i/2]+1;
    }
    memset(t,-1,sizeof(t));
    dfs(root,-1);
    int lg1=log2(n)+1;

    for(int j=1;j<=lg1;j++)
    {
        for(int i=1;i<=n;i++)
        {
            if(t[i][j-1]!=-1)
                t[i][j]=t[t[i][j-1]][j-1];
        }
    }
}

int kthParent(int u,long long int k)
{
    if(k>n)
        return -1;
    int lg1=log2(k)+1;

    for(int i=lg1;i>=0;i--)
    {
        if(u==-1)
            return -1;
        if((1<<i)<=k)
        {
	    k-=(1<<i);
            u=t[u][i];
        }
    }
    return u;
}


int lca(int u,int v)
{
    // cout <<"h" << endl;
    if(level[u]<level[v])
        swap(u,v);
    int lg1=log2(n)+1;

    for(int i=lg1;i>=0;i--)
    {
        if(t[u][i]!=-1  && level[u]-(1<<i)>=level[v])
        {
            u=t[u][i];
        }
    }
    // cout << u << " " << v << endl;
    if(u==v)
        return u;

    for(int i=lg1;i>=0;i--)
    {
        if(t[u][i]!=-1 && t[u][i]!=t[v][i])
        {
            u=t[u][i];
            v=t[v][i];
        }
    }
    // cout << u << " " << v << endl;
    return t[u][0];
}
int distance(int u,int v)
{
    return level[u]+level[v]-(2*level[lca(u,v)]);
}
int Case;
void solve()
{
    int a=0,b=0,i=0,j=0,m=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    for(int i = 0; i < N; i++) 
    {
        adj[i].clear();
        level[i] = 0;
        t[i][0] = 0;
    }

    cin >> n;
    for(int i = 1; i <= n; i++)
    {
        cin >> m;
        for(int j = 1; j <= m; j++)
        {
            int k;
            cin >> k;
            adj[i].push_back(k);
            adj[k].push_back(i);
        }
    }
    cin >> k;
    root = 1;
    // dfs(1,-1);
    build();
    // printf("Case %lld:\n",++Case);
    cout << "Case " << ++Case << ":\n"; 
    while(k--)
    {
        int u, v;
        cin >> u >> v;
    // YES;
    // cout << "ashse" << endl;
        cout << lca(u,v) << endl;
    }

}
int main()
{

    int t;
    cin >> t;
    while(t--)
    {
        solve();
    }
	return 0;
}
