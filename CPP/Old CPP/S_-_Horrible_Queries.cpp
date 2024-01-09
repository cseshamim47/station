// In the name of ALLAH
// cseshamim47
// 23-11-2022 01:33:02

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

vector<int> Bit1; // assign O(n) space for n elements
vector<int> Bit2; // assign O(n) space for n elements
void Update(vector<int>& Bit, int idx, int val) // O(logN) -> single time update korte logN time lage...taile N ta items er jonne O(NlogN) time lagbe
{
    int N = Bit.size();
    for(idx; idx<N; idx+=(idx&-idx))
    {
        Bit[idx]+=val;
    }
}
int Sum(vector<int>& Bit, int idx) // O(logN)
{
    int sum = 0;
    for(idx; idx>0; idx-=(idx&-idx))
    {
        sum += Bit[idx];
    }
    return sum;
}
void RangeUpdate(int l, int r, int val) // O(4*logN)
{
    Update(Bit1,l,val);
    Update(Bit1,r+1,-val);
    Update(Bit2,l,val*(l-1));
    Update(Bit2,r+1,-val*r);
}
int PrefixSum(int idx)
{
    return Sum(Bit1,idx)*idx - Sum(Bit2,idx);
}
int RangeSum(int l,int r)
{
    return PrefixSum(r)-PrefixSum(l-1);
}

void solve()
{
    int a=0,b=0,i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    n = in, k = in;
    Bit1.resize(n+10,0);
    Bit2.resize(n+10,0);
    cout << "Case " << ++Case << ":" << endl;
    while(k--)
    {
        int x = in;
        if(x == 0)
        {
            cin >> i >> j >> x;
            i++;
            j++;
            RangeUpdate(i,j,x);
        }else
        {
            cin >> i >> j;
            i++;
            j++;
            cout << RangeSum(i,j) << endl;
        }
    }
    Bit1.clear();
    Bit2.clear();
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