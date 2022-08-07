// In the name of ALLAH
// █▀▄▀█ █▀▄   █▀ █░█ ▄▀█ █▀▄▀█ █ █▀▄▀█   ▄▀█ █░█ █▀▄▀█ █▀▀ █▀▄
// █░▀░█ █▄▀   ▄█ █▀█ █▀█ █░▀░█ █ █░▀░█   █▀█ █▀█ █░▀░█ ██▄ █▄▀
// cseshamim47
// 30-07-2022 03:12:40


#include <bits/stdc++.h>
#include <ext/pb_ds/assoc_container.hpp>
using namespace std;
using namespace __gnu_pbds;

#define int long long
#define ll unsigned long long
#define sett tree<int, null_type, less_equal<int>, rb_tree_tag, tree_order_statistics_node_update >  /// cout<<*os.find_by_order(val)<<endl; // k-th element it /// less_equal = multiset, less = set, greater_equal = multiset decreasing, greater = set decreaseing ///  cout<<os.order_of_key(val)<<endl;  // strictly smaller or greater
#define fo(i,n) for(i=0;i<n;i++)
#define Fo(i,k,n) for(i=k;k<n?i<n:i>n;k<n?i+=1:i-=1)
#define pi(x)	printf("%d\n",x)
#define pl(x)	printf("%lld\n",x)
#define plg(x)	printf("%lld ",x)
#define ps(s)	printf("%s\n",s)
#define YES printf("YES\n")
#define NO printf("NO\n")
#define MONE printf("-1\n")
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
#define nl printf("\n");
#define endl "\n"
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

void f()
{}

int Case;

                    // Code Starts From Here       	
int exchange(int x)
{
    if(x == 1) return 1;
    if(x == 2) return 5;
    if(x == 3) return -1;
    if(x == 4) return -1;
    if(x == 5) return 2;
    if(x == 6) return -1;
    if(x == 7) return -1;
    if(x == 8) return 8; 
    if(x == 9) return -1; 
    if(x == 0) return 0; 
    return -1;
}
int H, M;
bool isValid(int h,int m)
{
    if(exchange(h%10) == -1 || exchange((h/10)) == -1 || exchange(m%10) == -1 || exchange(m/10) == -1) return false;
    int h1 = h%10, h2 = h/10;

    h1 = exchange(h1);
    h2 = exchange(h2);

    int m1 = m%10, m2 = m/10;
    m1 = exchange(m1);
    m2 = exchange(m2);
    int a = (h1*10)+h2;
    int b = (m1*10)+m2;
    if(b >= H ||  a >= M) return false;
    // cout << b << " " << a << endl;
    return true;
}

void solve()
{
    int i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    H = in, M = in;
    int h = in;
    char c = in;
    m = in;
    
    while(true)
    {
        if(isValid(h,m))
        {
            if(h < 10) cout << 0;
            cout << h << ":";
            if(m < 10) cout << 0;
            cout << m << endl;
            break;
        }

        m = (m+1)%M;
        if(m == 0)
        h = (h+1)%H;

        // cout << h << " " << m << endl;
        // getchar();
    }


    // while()
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