// In the name of ALLAH
// cseshamim47
// 22-09-2022 03:38:00


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
int n,m;

const int N = 20;
char c[N][N];
bool vis[N][N];
int level[N][N];
bool loop;
int a1,a2,a3;
void dfs(int i,int j,int p,int q)
{
    if(i < 0 || i >= n || j < 0 || j >= m|| vis[i][j]) 
    {
        if(vis[i][j])
        {
            loop = true;
    // deb2(i,j);
    // deb2(p,q);

            a2 = level[p][q]-level[i][j]+1;
            a1 = level[i][j]-1;
        }
        
        return;
    }

    vis[i][j] = true;
    level[i][j] = level[p][q]+1;
    a3 = level[i][j];
    // cout << c[i][j] << " " << level[i][j] << " " << level[p][q] << endl;
    // cout << level[p][q]+1 << endl;
    if(c[i][j] == 'N') dfs(i-1,j,i,j);
    else if(c[i][j] == 'S') dfs(i+1,j,i,j);
    else if(c[i][j] == 'E') dfs(i,j+1,i,j);
    else dfs(i,j-1,i,j);
}

void solve()
{
    int a=0,b=0,i=0,j=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    
    
    while(cin >> n >> m >> k)
    {
        fo(i,20)
        {
            fo(j,20)
            {
                vis[i][j] = false;
                level[i][j] = 0;
                loop = false;
                a1 = a2 = a3 = 0;
            }
        }
        if(n == 0 && m == 0 && k == 0) return;
        fo(i,n)
        {
            fo(j,m)
            {
                c[i][j] = in;
            }
        }
        dfs(0,k-1,0,k-1);
        if(loop)
        {
            printf("%lld step(s) before a loop of %lld step(s)\n",a1,a2);
        }else
        {
            printf("%lld step(s) to exit\n",a3);
        }
        // cout << a1 << " " << a2 << " " << a3 << endl;
    }



}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    // w(t)
    solve();
    // f();
}