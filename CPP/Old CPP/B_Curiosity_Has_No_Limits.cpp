// In the name of ALLAH
// cseshamim47
// 08-11-2022 19:12:26

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



void solve()
{
    int a=0,b=0,i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    n = in;
    vi v(n);
    fo(i,n-1)
    {
        v[i] = in;
    }
    m = n;
    vi vv(m);
    fo(i,m-1) vv[i] = in;	
    int t1 = 0;
    int t2 = 0;
    vector<int> out;
    vector<int> out2;
    a = v[n-2];
    b = vv[n-2];
    bool ok = false;
    
    fo(t1,4)
    {
        // cout << a << " " << b << " " << t1 << " - > ";
        fo(t2,4)
        {
            if((t1|t2) == a && (t1&t2) == b)
            {
                out.pb(t1);
                out.pb(t2);
                out2.pb(t2);
                out2.pb(t1);
                ok = true;
                break;
                // cout << t2 << " ";
            }
        }
        if(ok) break;
        // cout << endl;
    }
    // cout << out.size() << endl;
    int hobena[2]={};
    Fo(i,1,n-1)
    {
        a = v[i];
        b = vv[i];
        if(out.size() == i+1)
        {
            bool ok = false;
            t1 = out.back();   
            t2 = 0;
            fo(t2,4)
            {
                if((t1|t2) == a && (t1&t2) == b)
                {
                    out.pb(t2);
                    break;
                }
            }
            
        }else hobena[0] = 1;
    }
    Fo(i,1,n-1)
    {
        a = v[i];
        b = vv[i];
        if(out2.size() == i+1)
        {
            bool ok = false;
            t1 = out2.back();   
            t2 = 0;
            fo(t2,4)
            {
                if((t1|t2) == a && (t1&t2) == b)
                {
                    out2.pb(t2);
                    break;
                }
            }
            
        }else hobena[1] = 1;
    }
    if(out2.size() != n) hobena[1] = 1;
    if(out.size() != n) hobena[0] = 1;

    if(hobena[0] && hobena[1]) NO;
    else
    {
        YES;
        if(!hobena[0])
        cout << out;
        else cout << out2;
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