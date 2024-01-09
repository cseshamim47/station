// In the name of ALLAH
// cseshamim47
// 19-11-2022 18:41:45

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

const int N = 2e5+100;
vector<int> Sum(N,0);
vector<int> track(N,0);



int bar = 0;

void solve()
{
    int a=0,b=0,i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    n = in;
    vi v(n);
    fo(i,n)
    {
        Sum[i+1] = in;
    }
    q = in;

    while(q--)
    {
        a = in;
        if(a == 1)
        {
            cin >> a;
            sum = a;
            bar++;
        }else if(a == 2)
        {
            cin >> a >> b;
            if(bar > 0 && track[a] < bar)
            {
                track[a] = bar;
                Sum[a] = sum+b;
            }else 
            {
                Sum[a] += b;
            }
        }else 
        {
            a = in;
            if(track[a] == bar)
            cout << Sum[a] << endl;
            else cout << sum << endl;
        }
    }
}

// 1 2 3  4 5 6 7 8 9 10
// 1 8 4 15 7 5 7 5 8 0
/* 
    // 7
*/
int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    // w(t)
    solve();
    // f();
}