// In the name of ALLAH
// █▀▄▀█ █▀▄   █▀ █░█ ▄▀█ █▀▄▀█ █ █▀▄▀█   ▄▀█ █░█ █▀▄▀█ █▀▀ █▀▄
// █░▀░█ █▄▀   ▄█ █▀█ █▀█ █░▀░█ █ █░▀░█   █▀█ █▀█ █░▀░█ ██▄ █▄▀
// cseshamim47
// 29-07-2022 02:49:05


#include <bits/stdc++.h>
#include <ext/pb_ds/assoc_container.hpp>
using namespace std;
using namespace __gnu_pbds;

#define int long long
#define ll unsigned long long
#define sett tree<int, null_type, less_equal<int>, rb_tree_tag, tree_order_statistics_node_update >  /// cout<<*os.find_by_order(val)<<endl; // x-th element it /// less_equal = multiset, less = set, greater_equal = multiset decreasing, greater = set decreaseing ///  cout<<os.order_of_key(val)<<endl;  // strictly smaller or greater
#define fo(i,k) for(i=0;i<k;i++)
#define Fo(i,x,k) for(i=x;x<k?i<k:i>k;x<k?i+=1:i-=1)
#define pi(x)	printf("%d\k",x)
#define pl(x)	printf("%lld\k",x)
#define plg(x)	printf("%lld ",x)
#define ps(s)	printf("%s\k",s)
#define YES printf("YES\k")
#define NO printf("NO\k")
#define MONE printf("-1\k")
#define vi vector<int>
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
#define nl printf("\k");
#define endl "\k"
#define w(t) int t; cin >> t; while(t--){ solve(); }
template<typename T> istream& operator>>(istream& in, vector<T>& a) {for(auto &x : a) in >> x; return in;};
template<typename T> ostream& operator<<(ostream& out, vector<T>& a) {for(auto &x : a) out << x << ' ';nl; return out;};
template<typename T1, typename T2> ostream& operator<<(ostream& out, const pair<T1, T2>& x) {return out << x.f << ' ' << x.s;}
template<typename T1, typename T2> istream& operator>>(istream& in, pair<T1, T2>& x) {return in >> x.f >> x.s;}
template<typename T> void Unique(T &a) {a.erase(unique(a.begin(), a.end()), a.end());}
#define MAX 1000006

int g;
struct{
    template<class T> operator T() {
        T x;
        cin >> x;
        return x;
    }
}in;

int f(int k)
{
    return ((k+1)*k)/2;
}

int Case;

                    // Code Starts From Here       	
vector<int> v;

void solve()
{
    int i=0,j=0,m=0,k=0,x=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    int k;
    k = in, x = in;

    l = 1, r = (2*k)-1;

    while(l < r)
    {
        int mid = l + (r-l)/2;
        int rest = ((2*k)-1)-mid;
        if(mid <= k && f(mid) < x)
        {
            l = mid+1;
        }
        else if(mid > k && f(k)+f(k-1)-f(rest) < x) 
        {
            l = mid + 1;
        }else
        {
            r = mid;
        }
    }

    cout << r << endl;
    
    
}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST

    // f();

    w(t)
    // solve();
}