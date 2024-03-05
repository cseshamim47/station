// In the name of ALLAH
// cseshamim47
// 14-11-2022 19:08:42

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
template<typename T1, typename T2> ostream& operator<<(ostream& out, const pair<T1, T2>& x) {return out << x.F << ' ' << x.S << endl;}
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
const int MX = 1010;
int parent[MX],R[MX];
vector<int> par1(MX),par2(MX),R1(MX),R2(MX);



void init()
{
    for(int i = 0; i < MX; i++)
    {
        par1[i] = i;
        par2[i] = i;
        R1[i] = 1;
        R2[i] = 1;
    }
}

int Find(int u, vector<int> &parent)
{
    if(u == parent[u]) return u;
    return parent[u] = Find(parent[u], parent); // path compression
    
}

void Union(int u, int v,vector<int> &parent,vector<int> &R)
{
    int p = Find(u,parent);
    int q = Find(v,parent);
    if(p != q)
    {
        if(R[p] >= R[q])
        {
            parent[q] = p;
            R[p] += R[q];
        }else
        {
            parent[p] = q;
            R[q] += R[p];
        }
    } 
}



bool isFriend(int u, int v,vector<int> &parent)
{
    int p = Find(u,parent);
    int q = Find(v,parent);
    return p == q;
}

void solve()
{
    int a=0,b=0,i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    n = in, a = in, b = in;
    init();
    fo(i,a)
    {
        int u, v;
        cin >> u >> v;
        Union(u,v,par1,R1);
    }
    fo(i,b)
    {
        int u, v;
        cin >> u >> v;
        Union(u,v,par2,R2);
    }

    vii vp;
    Fo(i,1,n+1)
    {
        Fo(j,i,n+1)
        {
            if(i == j) continue;

            if((Find(i,par1) != Find(j,par1)) && ((Find(i,par2) != Find(j,par2))))
            {
                Union(i,j,par1,R1);
                Union(i,j,par2,R2);
                vp.push_back({i,j});
            }
        }
    }
    cout << vp.size() << endl;
    for(auto x : vp)
    {
        cout << x.F << " " << x.S << endl;
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