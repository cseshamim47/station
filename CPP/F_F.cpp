// In the name of ALLAH
// cseshamim47
// 05-02-2023 07:03:06

#include <bits/stdc++.h>
#include <ext/pb_ds/assoc_container.hpp>
using namespace std;
using namespace __gnu_pbds;

#define TIMER class Timer { private: chrono::time_point <chrono::steady_clock> Begin, End; public: Timer () : Begin(), End (){ Begin = chrono::steady_clock::now(); } ~Timer () { End = chrono::steady_clock::now();cerr << "\nDuration: " << ((chrono::duration <double>)(End - Begin)).count() << "s\n"; } } T;
#define int long long
#define ll unsigned long long
#define uset tree<int, null_type, less_equal<int>, rb_tree_tag, tree_order_statistics_node_update >  /// cout<<*os.find_by_order(val)<<endl; // k-th element it /// less_equal = multiset, less = set, greater_equal = multiset decreasing, greater = set decreaseing ///  cout<<os.order_of_key(val)<<endl;  // strictly smaller or greater
#define fo(i,n) for(int i=0;i<n;i++)
#define Fo(i,k,n) for(int i=k;k<n?i<n:i>n;k<n?i+=1:i-=1)
#define YES printf("Yes\n")
#define NO printf("No\n")
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
#define piis [](auto &a, auto &b){return a.S < b.S;}
#define piig [](auto &a, auto &b){return a.S > b.S;}
template<typename T> istream& operator>>(istream& in, vector<T>& a) {for(auto &x : a) in >> x; return in;};
template<typename T> ostream& operator<<(ostream& out, vector<T>& a) {for(auto &x : a) out << x << ' ';nl; return out;};
template<typename T1, typename T2> ostream& operator<<(ostream& out, const pair<T1, T2>& x) {return out << x.F << ' ' << x.S  << endl;}
template<typename T1, typename T2> istream& operator>>(istream& in, pair<T1, T2>& x) {return in >> x.F >> x.S;}
template<typename T> void Unique(T &a) {a.erase(unique(a.begin(), a.end()), a.end());}


// ********** Input ********** //
struct{
    template<class T> operator T() {
        T x;
        cin >> x;
        return x;
    }
}in;

// ********** USEFUL FUNCTIONS ********** //

// ********** check wheather k'th bit of n is set or not ********** //
bool checkBit(int n, int k){ if (n & (1 << k)) return true; else return false; } // O(1)

// ********** GCD ********** //
int gcd(int a, int b) // O(logN)
{
    if(!b) return a;
    return gcd(b,a%b);
}

// ********** Extended GCD ********** //
struct triplet
{
    int x;
    int y;
    int gcd;
};

triplet egcd(int a, int b) // O(logN)
{
    if(b == 0)
    {
        triplet ans;
        ans.x = 1;
        ans.y = 1;
        ans.gcd = a;
        return ans;
    }
    triplet ans1 = egcd(b,a%b);
    triplet ans;
    ans.x = ans1.y;
    ans.y = ans1.x-(a/b)*ans1.y;
    ans.gcd = ans1.gcd;
    return ans;
}

// ********** Useful Variables ********** //
#define INF 1e9
int Case,g;
const int N = 3*1e5;

// ********** DFS useful ********** //
bool vis[N];
vector<int> adj[N];

// ********** DFS ********** //
void dfs(int vertex)
{
    vis[vertex] = true;
    for(auto child : adj[vertex])
    {
        if(vis[child]) continue;
        dfs(child);
    }
}

// ********** DFS cycle detection ********** //
bool dfsCycle(int vertex,int parent) /// have cycle = true, else = false
{
    bool a = false;
    vis[vertex] = true;
    for(auto child : adj[vertex])
    {
        if(child != parent && vis[child])
        {
            return true;
        }else if(vis[child] == false)
        {
            a = dfsCycle(child,vertex);
        }
    }
    return a;
}


// ********** Directional Array ********** //
int dx[] = {-1, 1, 0, 0,-1,-1, 1,1};
int dy[] = { 0, 0,-1, 1,-1, 1,-1,1};

  /// Segment Tree Start
const int MX = 2e5+100;
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
    Tree[node] = max(Tree[Left],Tree[Right]);
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
    return max(leftTreeVal,rightTreeVal);
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
    Tree[node] = max(Tree[Left], Tree[Right]);
}
/// Segment Tree end

//## Save Palestine ##//
void solve()
{
    int a=0,b=0,i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    cin >> n >> k;
    vii v(n);

    fo(i,n)
    {
        v[i].S = in;
        v[i].F = i;
        arr[i+1] = 0;
    }

    init(1,1,n);


  

    sort(all(v),piis);
    // for(auto x : v) cout << x.S << " ";
    // cout << endl;    
    vi out(n);
    fo(i,n)
    {
        int ans1 = 0;
        l = i, r = n-1;
        int idx = -1;
        while(l <= r)
        {
            int mid = (l+r >> 1);
            if(v[mid].S <= v[i].S+k)
            {
                l = mid+1;
                idx = mid;
            }else 
            {
                r = mid-1;
            }
        }


        if(idx >= 0)
        {
            ans1 = (idx-i);
        }
        
        out[v[i].F] = ans1+1;
        update(1,1,n,i+1,out[v[i].F]);

    }

    fo(i,n)
    {
        
        l = 0, r = i;
        int idx = -1;
        while(l <= r)
        {
            int mid = (l+r >> 1);
            if(v[mid].S +k >= v[i].S)
            {
                r = mid -1;
                idx = mid;
            }else 
            {
                l = mid+1;
            }
        }

        int ans2 = 0;
        if(idx >= 0)
        {
            ans2 = (i-idx);
        }
        int left = idx+1;

        int ans3 = query(1,1,n,left,i+1);
        out[v[i].F] = ans3;

    }
    cout << out;

    
cout << endl;
}


/* 


2
1 2 3 4 5 6  7  8  9  10 11 12 13 14 15 16 17
1 1 2 2 2 3  3  3  4  5  6  7  8  8  8  9  10
8 8 9 9 9 10 10 10 11 12 15 16 17 17 17 17 17
8 8 8 8 8  8 8  8  









*/


int32_t main()
{
      //        Bismillah
    //   TIMER
    // fileInput();
    // BOOST
    // w(t)
    solve();
}


/* 

DFS INPUT

n = in;
m = in;
fo(i,m)
{
    cin >> a >> b;
    adj[a].push_back(b);
    adj[b].push_back(a);
}

*/