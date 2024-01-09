// In the name of ALLAH
// cseshamim47
// 19-01-2023 20:59:45

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
int m,n;
char c[400][400];

map<pii,bool> vis;

int out;

bool isValid(int i, int j, char prev)
{
    if(i >= n || i < 0 || j >= m || j < 0 || vis[{i,j}] || c[i][j] == prev) return false;
    else return true;
}

int black = 0, white = 0;

void dfs(int i, int j, char prev)
{
    vis[{i,j}] = true;
    if(c[i][j] == '#') black++;
    else white++;
    for(int k = 0; k < 4; k++)
    {
        int ni = i + dx[k];
        int nj = j + dy[k];

        if(isValid(ni,nj, prev))
        {
            if(c[ni][nj] != '#')
            {
            // cout << ni << ' ' << nj << endl;
                out++;
            }
            dfs(ni,nj,c[ni][nj]);
        }
    }
}

void solve()
{
    int a=0,b=0,i=0,j=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    n = in;
    m = in;
    vector<pii> v;
    fo(i,n)
    {
        fo(j,m)
        {
            c[i][j] = in;
            if(c[i][j] == '#') v.pb({i,j});
        }
    }

    fo(i,n)
    {
        fo(j,m)
        {
            if(c[i][j] == '#')
            {
                black = 0, white = 0;
                dfs(i,j,'#');
                ans += (black*white);
            }
        }
    }
    // map<pii,int> mp;
    // for(auto x : v)
    // {
    //     if(mp[{x.F,x.S}] == false) 
    //     {
    //         dfs(x.F,x.S,'#');
    //         for(auto y : v)
    //         {
    //             if(vis[{y.F,y.S}]) 
    //             {
    //                 cnt++;
    //                 mp[{y.F,y.S}] = true;
    //             }
    //         }
    //         ans += (cnt*out);
    //         // cout << ans << endl;
    //         cnt = 0;
    //         out = 0;
    //         vis.clear();
    //     }
    // }
    cout << ans << endl;

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