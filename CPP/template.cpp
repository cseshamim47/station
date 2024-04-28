#include <bits/stdc++.h>
#include <ext/pb_ds/assoc_container.hpp>
using namespace std;
using namespace __gnu_pbds;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);

mt19937_64 rang(chrono::high_resolution_clock::now().time_since_epoch().count());
int rng(int lim) {
uniform_int_distribution<int> uid(0,lim-1);
return uid(rang);
}

#define TIMER class Timer { private: chrono::time_point <chrono::steady_clock> Begin, End; public: Timer () : Begin(), End (){ Begin = chrono::steady_clock::now(); } ~Timer () { End = chrono::steady_clock::now();cerr << "\nDuration: " << ((chrono::duration <double>)(End - Begin)).count() << "s\n"; } } T;

#define int long long
#define ll unsigned long long
#define uset tree<int, null_type, less_equal<int>, rb_tree_tag, tree_order_statistics_node_update >  /// cout<<*os.find_by_order(val)<<endl; // k-th element it /// less_equal = multiset, less = set, greater_equal = multiset decreasing, greater = set decreaseing ///  cout<<os.order_of_key(val)<<endl;  // strictly smaller or greater
#define fo(i,n) for(int i=0;i<n;i++)
#define Fo(i,k,n) for(int i=k;k<n?i<n:i>n;k<n?i+=1:i-=1)
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
#define nl printf("\n");
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define piis [](auto &a, auto &b){return a.S < b.S;}
#define piig [](auto &a, auto &b){return a.S > b.S;}
#define bitOne(x) __builtin_popcount(x)
#define read freopen("input.txt","r",stdin)
#define write freopen("output.txt","w",stdout)
template<typename T> istream& operator>>(istream& in, vector<T>& a) {for(auto &x : a) in >> x; return in;};
template<typename T> ostream& operator<<(ostream& out, vector<T>& a) {for(auto &x : a) out << x << ' ';nl; return out;};
template<typename T1, typename T2> ostream& operator<<(ostream& out, const pair<T1, T2>& x) {return out << x.F << ' ' << x.S  << endl;}
template<typename T1, typename T2> istream& operator>>(istream& in, pair<T1, T2>& x) {return in >> x.F >> x.S;}
template<typename T> void Unique(T &a) {a.erase(unique(a.begin(), a.end()), a.end());}

const int MOD=1000000007;
inline void normal(int &a) { a %= MOD; (a < 0) && (a += MOD); }

inline int modMul(int a, int b) { a %= MOD, b %= MOD; normal(a), normal(b); return (a*b)%MOD; }

inline int modAdd(int a, int b) { a %= MOD, b %= MOD; normal(a), normal(b); return (a+b)%MOD; }

inline int modSub(int a, int b) { a %= MOD, b %= MOD; normal(a), normal(b); a -= b; normal(a); return a; }

inline int modPow(int b, int p) { int r = 1; while(p) { if(p&1) r = modMul(r, b); b = modMul(b, b); p >>= 1; } return r; }

inline int modInverse(int a) { return modPow(a, MOD-2); }

inline int modDiv(int a, int b) { return modMul(a, modInverse(b)); }


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

triplet egcd(int a, int b) // O(logN) // egcd(a,b).x = (1/a)%b // a & b must be coprime 
{
    if(b == 0)
    {
        triplet ans;
        ans.x = 1; // must be 1 in base case
        ans.y = 1; // y can be anything since y becomes 0 in gcd(x,y)
        ans.gcd = a;
        return ans;
    }
    triplet ans1 = egcd(b,a%b);
    triplet ans;
    ans.x = ans1.y; // X is the multiplicative inverse of A under B
    ans.y = ans1.x-(a/b)*ans1.y;
    ans.gcd = ans1.gcd;
    return ans;
}

int ModInv(int a, int m)
{
    auto ans = egcd(a,m);
    return (ans.x%m + m)%m; // to avoid neg value 
    // ans.gcd must be 1
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

/// precalculate factorial 
int fact[N];
void preFact()
{
    fact[0] = 1;
    for(int i = 1; i < N; i++)
    {
        fact[i] = (1LL*fact[i-1]*i)%mod;
        if(fact[i] < 0) fact[i] += mod;
    }
}

// ncr mod
int ncr(int n,int r)
{
    int denom = (fact[n-r] * fact[r] * 1LL)%mod; 
    int res = (1LL * fact[n] * inverse(denom))%mod;
    if(res < 0) res += mod;
    return res%mod;
}


//## Those who cannot remember the past are condemned to repeat it ##//
void solve()
{
    int a=0,b=0,i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    
    
}





int32_t main()
{
      //        Bismillah
    //   TIMER
    // fileInput();
    // BOOST
    // w(t)
    // solve();
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


/* 
these need to be added 
transform(all(str),str.begin(),::tolower);


int big_mod(int base, int power, int mod)
{
    if(power==0)    return 1;
    //কোন কিছুর power 0 হলে তার মান 1 হয়ে যায়
    else if(power%2==1) //power বেজোড় হলে
    {
        int p1 = base % mod;
        int p2 = (big_mod(base,power-1,mod))%mod;
        return (p1*p2)%mod;
    }
    else if(power%2==0) //power জোড় হলে
    {
        int p1 = (big_mod(base,power/2,mod))%mod;
        return (p1*p1)%mod;
    }
}

*/



/* 
##### Techniques #####
1. Contribution Technique
2. Binary Search on ans
3. Binary Search on other thing
4. Ternary Search 
5. Number Theory
6. DP
7. Segment Tree
8. PBDS
9. Set/map
10. Sieve or Backward Sieve


*/