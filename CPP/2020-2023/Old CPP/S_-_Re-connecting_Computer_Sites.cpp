// In the name of ALLAH
// cseshamim47
// 18-11-2022 00:27:44

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


/// Kruskals start
#define MX 200005
int parent[MX], R[MX];

struct kruskalStruct{
    int u,v,w;
    bool vis;
};
static bool cmp(kruskalStruct &a, kruskalStruct &b)
{
    return a.w < b.w;
}

void init(int v)
{
    for(int i = 0; i <= v; i++)
    {
        parent[i] = i;
        R[i] = 1;
    }
}

int Find(int p)
{
    if(p == parent[p]) return p;
    return parent[p] = Find(parent[p]);
}

bool Union(int u,int v)
{
    int p = Find(u);
    int q = Find(v);

    if(p != q) 
    {
        if(R[p] >= R[q])
        {
            parent[q] = p;
            R[p] += R[q];
        }
        else
        {
            parent[p] = q;
            R[q] += R[p];
        }
        return true;
    }
    return false;
}



vector<kruskalStruct> store;
vector<kruskalStruct> newStore;

void kruskalsMST()
{
    int vertex,edge;
    int kkk = 0;
    while(cin >> vertex)
    {
        if(kkk != 0) cout << endl; 
        kkk++;
        edge = vertex-1;

        init(vertex);

        for(int i = 0; i < edge; i++)
        {
            int u,v,w;
            cin >> u >> v >> w;
            kruskalStruct ks;
            ks.u = u; 
            ks.v = v;
            ks.w = w;
            store.push_back(ks);
        }
        int n = in;
        for(int i = 0; i < n; i++)
        {
            int u,v,w;
            cin >> u >> v >> w;
            kruskalStruct ks;
            ks.u = u; 
            ks.v = v;
            ks.w = w;
            newStore.push_back(ks);
        }
        n = in;
        for(int i = 0; i < n; i++)
        {
            int u,v,w;
            cin >> u >> v >> w;
            kruskalStruct ks;
            ks.u = u; 
            ks.v = v;
            ks.w = w;
            newStore.push_back(ks);
        }


        sort(store.begin(),store.end(),cmp);
        sort(newStore.begin(),newStore.end(),cmp);
        
        int totalWeight = 0;
        for(int i = 0; i < store.size(); i++)
        {
            if(Union(store[i].u,store[i].v)) totalWeight+=store[i].w;
        }
        init(vertex);
        int newtotalWeight = 0;
        for(int i = 0; i < newStore.size(); i++)
        {
            if(Union(newStore[i].u,newStore[i].v)) newtotalWeight+=newStore[i].w;
        }

        cout << totalWeight << endl;
        cout << newtotalWeight << endl;

        store.clear();
        newStore.clear();
        
    }
}
// Kruskals end

void solve()
{
    int a=0,b=0,i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    kruskalsMST();
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