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


//## Those who cannot remember the past are condemned to repeat it ##//
void solve()
{
    int a=0,b=0,i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    cin >> n;
    string aa,bb;
    cin >> aa >> bb;
    set<int> as,bs,cs;
    fo(i,n)
    {
        if(aa[i] == 'a') as.insert(i);
        if(aa[i] == 'b') bs.insert(i);
        if(aa[i] == 'c') cs.insert(i);
    }

    Fo(i,n-1,-1)
    {
        // deb(i);
        // for(auto x : as) cout << x << " ";
        // cout << endl;
        // for(auto x : bs) cout << x << " ";
        // cout << endl;
        // for(auto x : cs) cout << x << " ";
        // cout << endl;
        if(bb[i] == 'a')
        {   
            if(as.find(i) != as.end())
            {
                as.erase(i);
            }else if(bs.find(i) != bs.end())
            {
                if(as.empty())
                {
                    k = 1;
                    cout << "NO" << endl;
                    break;
                }

                int aidx = *prev(as.end());
                int bidx = i;

                if(cs.upper_bound(aidx) != cs.end())
                {
                    k = 2;

                    cout << "NO" << endl;
                    break;
                }
                bs.erase(i);
                as.erase(aidx);
                bs.insert(aidx);
            }else
            {
                                    k = 3;

                cout << "NO" << endl;
                break;
            }
        }else if(bb[i] == 'b')
        {
            if(bs.find(i) != bs.end())
            {
                bs.erase(i);
            }else if(cs.find(i) != cs.end())
            {
                if(bs.empty())
                {
                                        k = 4;

                    cout << "NO" << endl;
                    break;
                }

                int bidx = *prev(bs.end());
                int cidx = i;

                if(as.upper_bound(bidx) != as.end())
                {
                                        k = 5;

                    cout << "NO" << endl;
                    break;
                }
                cs.erase(i);
                bs.erase(bidx);
                cs.insert(bidx);
            }else
            {
                                    k = 6;

                cout << "NO" << endl;
                break;
            }
        }else if(bb[i] == 'c')
        {
            if(cs.find(i) != cs.end())
            {
                cs.erase(i);
            }else
            {
                k = 7;
                cout << "NO" << endl;
                break;
            }
        }

        
    }
    if(!k)
    cout << "YES" << endl;
    
}



int32_t main()
{
      //        Bismillah
    //   TIMER
    // fileInput();
    // BOOST
    w(t)
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