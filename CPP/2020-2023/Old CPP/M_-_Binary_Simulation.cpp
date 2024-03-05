// In the name of ALLAH
// cseshamim47
// 22-11-2022 19:04:40

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
const int MX = 1e5+10;
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
    // Tree[node] = Tree[Left] + Tree[Right];
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

void update(int node, int b, int e, int i, int j) // O(LogN)
{
    if(i > e || j < b) return;
    if(b>=i && e<=j)
    {
        Tree[node]++;
        return;
    }

    int Left = node*2;
    int Right = (node*2)+1;
    int mid = (b+e)/2;
    update(Left,b,mid,i,j);
    update(Right,mid+1,e,i,j);
    // Tree[node] = Tree[Left] + Tree[Right];
}
/// Segment Tree end

const int N = 2e5+10;
vector<int> Bit(N,0);
void Update(int idx, int val)
{
    for(idx; idx<N; idx+=(idx&-idx))
    {
        Bit[idx]+=val;
    }
}
int Sum(int idx)
{
    int sum = 0;
    for(idx; idx>0; idx-=(idx&-idx))
    {
        sum += Bit[idx];
    }
    return sum;
}

void solve()
{
    int a=0,b=0,i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    string str = in;
    n = s(str);
    fo(i,n)
    {
        if(str[i] == '0')
        {
            arr[i+1] = 0;
        }else arr[i+1] = 1;
        
        if(str[i] == '1')
        {
            int x = Sum(i+1);
            // if(x > 0) x--;
            x--;
            Update(i+1,-x);
        }else
        {
            int x = Sum(i+1);
            Update(i+1,-x);
        }
    }
    init(1,1,n);
    k = in;
    printf("Case %lld:\n",++Case);
    while(k--)
    {
        char ch = in;
        if(ch == 'I')
        {
            cin >> i >> j;
            update(1,1,n,i,j);
            // Update(i,1);
            // Update(j+1,-1);
        }else
        {
            i = in;
            // cout << Sum(i) << " " << Sum(i-1) << endl;
            // int x = Sum(i);
            int x = query(1,1,n,i,i);
            // cout << x << endl;
            if(x%2 == 0) cout << 0 << endl;
            else cout << 1 << endl;
        }
        // cout << Tree[9] << endl;
    }
    Bit.resize(N,0);
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