// In the name of ALLAH
// cseshamim47
// 05-01-2023 22:04:01

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
#define INF 1e13

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


void solve()
{
    int i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    n = in;
    vi v(n);
    set<int> sa;
    set<int> sb;

    fo(i,n)
    {
        v[i] = in;
        sa.insert(i+1);
        sb.insert(i+1);

    }
    vii a(n,{-1,-1});
    vii b(n,{-1,-1});

    fo(i,n)
    {
        int val = v[i];
        if(sa.find(val) != sa.end())
        {
            a[i].F = val;
            sa.erase(val);
        }else if(sb.find(val) != sb.end())
        {
            b[i].F = val;
            sb.erase(val);
        }
        a[i].S = i;
        b[i].S = i;
    }

    sort(all(a),[](auto &aa,auto &bb){return aa.F > bb.F;});

    fo(i,n) // a er upor traverse kore b banabo
    {
        int idx = a[i].S;
        int val = a[i].F;

        if(b[idx].F == -1)
        {
            if(sb.empty() == false && *(--sb.end()) <= val)
            {
                b[idx].F = *(--sb.end());
                sb.erase(b[idx].F);
            }else
            {
                NO;
                return;
            }  
        }
    }
    sort(all(a),[](auto &aa,auto &bb){return aa.S < bb.S;});

    sort(all(b),[](auto &aa,auto &bb){return aa.F > bb.F;});

    fo(i,n)
    {
        int idx = b[i].S;
        int val = b[i].F;

        if(a[idx].F == -1)
        {
            if(sa.empty() == false && *(--sa.end()) <= val)
            {
                a[idx].F = *(--sa.end());
                sa.erase(a[idx].F);
            }else
            {
                NO;
                return;
            }  
        }
    }
    
    sort(all(a),[](auto &aa, auto &bb){return aa.S < bb.S;});
    sort(all(b),[](auto &aa, auto &bb){return aa.S < bb.S;});
    YES;
    for(auto x : a) cout << x.F << " ";nl;
    for(auto x : b) cout << x.F << " ";nl;
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