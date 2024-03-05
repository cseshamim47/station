// In the name of ALLAH
// cseshamim47
// 24-11-2022 02:29:18

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

  /// Segment Tree Start
const int MX = 1e6+10;
int arr[MX];
int Tree[MX*4];

void init(int node, int b, int e)  // O(n) --> 2n nodes
{
    if(b==e)
    {
        Tree[node] = arr[b];
        return;
    }
    int Left = node*2; 
    int Right = (node*2)+1; 
    int mid = (b+e)/2;
    init(Left,b,mid);
    init(Right,mid+1,e);
    Tree[node] = Tree[Left] + Tree[Right];
}

int query(int node, int b, int e, int l, int r) // O(4*Log(n))
{
    if(l > e || r < b) return 0;
    if(l<=b && e<=r)
    {
        return Tree[node];
    }

    int Left = node*2;
    int Right = (node*2)+1;
    int mid = (b+e)/2;
    int leftTreeVal = query(Left,b,mid,l,r);
    int rightTreeVal = query(Right,mid+1,e,l,r);
    return leftTreeVal+rightTreeVal;
}

void update(int node, int b, int e, int i, int val) // O(LogN)
{
    if(i > e || i < b) return;
    if(b>=i && e<=i)
    {
        Tree[node] = val;
        return;
    }

    int Left = node*2;
    int Right = (node*2)+1;
    int mid = (b+e)/2;
    update(Left,b,mid,i,val);
    update(Right,mid+1,e,i,val);
    Tree[node] = Tree[Left] + Tree[Right];
}
/// Segment Tree end

void solve()
{
    int a=0,b=0,i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    n = in;
    k = in;
    vi v(n+1);
    fo(i,n)
    {
        v[i+1] = in;
        arr[i+1] = 1;
        // update(1,1,n+k,i+1,1);
    }
    // m = n + k;
    m = n;
    n += k;
    init(1,1,n);
    printf("Case %lld:\n",++Case);
    while(k--)
    {
        char ch = in;
        if(ch == 'c')
        {
            a = in;
            l = 1, r = n;
            while(l < r)
            {
                int mid = (l+r)/2;
                b = query(1,1,n,1,mid);
                // deb(b);
                // cout << l << " " << mid << " " << r << endl;
                if(b >= a)
                {
                    r = mid;
                }else
                {
                    l = mid+1;
                }
            }
            // deb(l);
            if(v[l] == 0)
            {
                cout << "none" << endl;
            }else
            {
                //  deb(l);
                update(1,1,n,l,0);
                // deb(query(1,1,n,l,l));
                // deb(query(1,1,n,1,l));
                cout << v[l] << endl;
                v[l] = 0;
            }
            // deb(Tree[7]);
            // deb(Tree[14]);
            // deb(Tree[15]);
        }else 
        {
            a = in;
            v.push_back(a);
            // ++n;
            ++m;
            update(1,1,n,m,1);
            // deb(query(1,1,n,n,n));
            // deb(v[n]);
        }
    }
    fo(i,n+1)
    {
        Tree[i]=arr[i] = 0;
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

