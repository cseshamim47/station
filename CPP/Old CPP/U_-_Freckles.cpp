// In the name of ALLAH
// cseshamim47
// 16-11-2022 01:13:37

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

#define MX 110

map<pair<double,double>,pair<double,double>> parent;



pair<double,double> Find(pair<double,double> u)
{
    if(u == parent[u]) return u;
    return parent[u] = Find(parent[u]); // path compression
    
}

void Union(pair<double,double> u, pair<double,double> v)
{
    auto p = Find(u);
    auto q = Find(v);
    if(p != q)
    {
        parent[q] = p;
    } 
}



bool isFriend(pair<double,double> u, pair<double,double> v)
{
    auto p = Find(u);
    auto q = Find(v);
    return p == q;
}

double dist(pair<double,double> &a, pair<double,double> &b)
{
    double distance = sqrt(sq(max(a.F,b.F)-min(a.F,b.F))+sq(max(a.S,b.S)-min(a.S,b.S)));
    return distance;
}



void solve()
{
    int a=0,b=0,i=0,j=0,m=0,n=0,k=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    double ans = 0.00;
    parent.clear();
    n = in;
    vector<pair<double,double>> vp(n);
    
    fo(i,n)
    {
        cin >> vp[i].F >> vp[i].S;
        parent[vp[i]] = vp[i];
    }
    
    
    pair<double,double> u = vp[0];
    pair<double,double> v;
    map<pair<double,double>,bool> vis;
    vis[u] = true;
    fo(i,n)
    {
        u = vp[i];
        double mn = INT_MAX;
        Fo(j,0,n)
        {            
            if(mn >= dist(vp[i],vp[j]) && !isFriend(vp[i],vp[j]))
            {
                v = vp[j];
                mn = dist(u,vp[j]);
            }
        }

        if(cnt < n-1)
        {
            ans += mn;
            // cout << u ;
            // cout << v;
            Union(u,v);
            vis[v] = true;
            u = v;
            cnt++;
        }

    }

    cout << setprecision(2) << fixed<<  ans << endl;
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