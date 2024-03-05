// In the name of ALLAH
// █▀▄▀█ █▀▄   █▀ █░█ ▄▀█ █▀▄▀█ █ █▀▄▀█   ▄▀█ █░█ █▀▄▀█ █▀▀ █▀▄
// █░▀░█ █▄▀   ▄█ █▀█ █▀█ █░▀░█ █ █░▀░█   █▀█ █▀█ █░▀░█ ██▄ █▄▀
// cseshamim47
// 06-08-2022 08:01:24


#include <bits/stdc++.h>
#include <ext/pb_ds/assoc_container.hpp>
using namespace std;
using namespace __gnu_pbds;

#define int long long
#define ll unsigned long long
#define sett tree<int, null_type, less_equal<int>, rb_tree_tag, tree_order_statistics_node_update >  /// cout<<*os.find_by_order(val)<<endl; // k-th element it /// less_equal = multiset, less = set, greater_equal = multiset decreasing, greater = set decreaseing ///  cout<<os.order_of_key(val)<<endl;  // strictly smaller or greater
#define fo(i,n) for(i=0;i<n;i++)
#define Fo(i,k,n) for(i=k;k<n?i<n:i>n;k<n?i+=1:i-=1)
#define pi(x)	printf("%d\n",x)
#define pl(x)	printf("%lld\n",x)
#define plg(x)	printf("%lld ",x)
#define ps(s)	printf("%s\n",s)
#define YES printf("YES\n")
#define NO printf("NO\n")
#define MONE printf("-1\n")
#define vi vector<int>
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
template<typename T1, typename T2> ostream& operator<<(ostream& out, const pair<T1, T2>& x) {return out << x.f << ' ' << x.s;}
template<typename T1, typename T2> istream& operator>>(istream& in, pair<T1, T2>& x) {return in >> x.f >> x.s;}
template<typename T> void Unique(T &a) {a.erase(unique(a.begin(), a.end()), a.end());}
#define MAX 510

int dx[] = {-1, 1, 0, 0,-1,-1, 1,1};
int dy[] = { 0, 0,-1, 1,-1, 1,-1,1};

int g;
struct{
    template<class T> operator T() {
        T x;
        cin >> x;
        return x;
    }
}in;

void f()
{}

int Case;

                    // Code Starts From Here    
int n,m;
char adj[MAX][MAX];
int out[MAX][MAX];
bool vis[MAX][MAX];
// bool vis2[MAX][MAX];
int cnt;

void dfs(int i,int j)
{
    if(i < 0 || i >= n || j < 0 || j >= m || vis[i][j] || adj[i][j] == '#') return;
    vis[i][j] = true;
    if(adj[i][j] == 'C') cnt++;

    for(int k = 0; k < 4; ++k)
    {
        int ni = i+dx[k];
        int nj = j+dy[k];
        dfs(ni,nj);
    }
}

// void dfs2(int i,int j)
// {
//     if(i < 0 || i >= n || j < 0 || j >= m || vis2[i][j] || adj[i][j] == '#') return;
//     vis2[i][j] = true;
//     out[i][j] = cnt;
//     for(int k = 0; k < 4; ++k)
//     {
//         int ni = i+dx[k];
//         int nj = j+dy[k];
//         dfs2(ni,nj);
//     }
// }

void solve()
{
    int a=0,b=0,i=0,j=0,k=0,ans=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    n = in, m = in, q = in;
    char c[n][m];
    fo(i,n)
    {
        fo(j,m)
        {
            adj[i][j] = in;
        }
    }

    // fo(i,n)
    // {
    //     fo(j,m)
    //     {
    //         if(vis[i][j] || adj[i][j] == '#')
    //         {
    //             continue;
    //         }

    //         cnt = 0;
    //         dfs(i,j);
            // dfs2(i,j);
            
    //     }
    // }
    printf("Case %lld: \n",++Case);
    memset(out,-1,sizeof(out));
    while(q--)
    {
        cnt = 0;
        memset(vis,false,sizeof(vis)); 
        i = in, j = in;
        i--;
        j--;
        if(out[i][j] == -1)
        {
            dfs(i,j);
            out[i][j] = cnt;
            cout << out[i][j] << endl;
            fo(i,n)
            {
                fo(j,m)
                {
                    if(vis[i][j]) out[i][j] = cnt;
                    // vis[i][j] = false;
                }
            }
        }else 
        {

            cout << out[i][j] << endl;
        }



    }

    // fo(i,n)
    // {
    //     fo(j,m)
    //     {
    //         vis[i][j] = false;
    //         vis2[i][j] = false;
    //         out[i][j] = -1;
    //         adj[i][j] = '.';
    //     }
    // }
    
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