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

// ********** STRING HASHING *************

const int MAXN=1000006;
namespace DoubleHash{
    int P[2][MAXN];
    int H[2][MAXN];
    int R[2][MAXN];
    int base[2];
    int mod[2];
    void gen(){
        base[0] = 1949313259ll;
        base[1] = 1997293877ll;
        mod[0]  = 2091573227ll;
        mod[1]  = 2117566807ll;
        for(int j=0;j<2;j++){
            for(int i=0;i<MAXN;i++){
                H[j][i]=R[j][i] = 0ll;
                P[j][i] = 1ll;
            }
        }
        for(int j=0;j<2;j++){
            for(int i=1;i<MAXN;i++){
                P[j][i] = (P[j][i-1] * base[j])%mod[j];
            }
        }
    }
    void make_hash(string arr){
        int len = arr.size();
        for(int j=0;j<2;j++){

            int k = 0;
            for (int i = 1; i <= len; i++)
            {
                if(arr[k] == ' ') 
                {
                    k++;
                }
                H[j][i] = (H[j][i - 1] * base[j] + arr[k++] + 1007) % mod[j];
            }
            
//            for (int i = len; i >= 1; i--)R[j][i] = (R[j][i + 1] * base[j] + arr[i - 1] + 1007) % mod[j];
        }
    }
    inline int range_hash(int l,int r,int idx){
        int hashval = H[idx][r + 1] - ((long long)P[idx][r - l + 1] * H[idx][l] % mod[idx]);
        return (hashval < 0 ? hashval + mod[idx] : hashval);
    }
    inline int reverse_hash(int l,int r,int idx){
        int hashval = R[idx][l + 1] - ((long long)P[idx][r - l + 1] * R[idx][r + 2] % mod[idx]);
        return (hashval < 0 ? hashval + mod[idx] : hashval);
    }
    inline int range_dhash(int l,int r){
        int x = range_hash(l,r,0);
        return (x<<32)^range_hash(l,r,1);
    }
    inline int reverse_dhash(int l,int r){
        int x = reverse_hash(l,r,0);
        return (x<<32)^reverse_hash(l,r,1);
    }
}
char str1[MAXN];

using namespace DoubleHash;

//## Those who cannot remember the past are condemned to repeat it ##//
void solve()
{
    int a=0,b=0,i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;

    string str;
    gen();
    while(getline(cin,str))
    {
        if(str.size() == 0) return;
        make_hash(str);
        n = s(str);
        fo(i,n)
        {
            unordered_map<int,int> mp;
            ans = 0;
            fo(j,n)
            {
                if(i+j >= n) break;
                int hash = range_dhash(j,j+i);
                mp[hash]++;
                ans = max(ans,mp[hash]);
            }
            
            if(ans == 1)
            {
                cout << endl;
                break;
            }
            cout << ans << endl;

        }

    }
    
    
}



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