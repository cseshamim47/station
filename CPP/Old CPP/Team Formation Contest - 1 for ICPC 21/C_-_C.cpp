// In the name of ALLAH
// █▀▄▀█ █▀▄   █▀ █░█ ▄▀█ █▀▄▀█ █ █▀▄▀█   ▄▀█ █░█ █▀▄▀█ █▀▀ █▀▄
// █░▀░█ █▄▀   ▄█ █▀█ █▀█ █░▀░█ █ █░▀░█   █▀█ █▀█ █░▀░█ ██▄ █▄▀
// cseshamim47
// 11-08-2022 21:43:50


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

int dx[] = {-1, 1, 0, 0,-1,-1, 1,1};
int dy[] = { 0, 0,-1, 1,-1, 1,-1,1};

bool ch(char c)
{
    if(c == 'a' || c == 'e' || c == 'i' || c == 'o' || c == 'u') return true;
    else return false;
}

int f(string &str)
{
    str.push_back('#');
    reverse(all(str));
    int cnt = 0;
    for(int i = 0; i < str.size(); i++)
    {
        if(i == 0 && ch(str[i])) cnt++;
        else if(ch(str[i]) && !ch(str[i-1])) cnt++;
    }
    return cnt;
}

int Case;

                    // Code Starts From Here       	
void solve()
{
    int a=0,b=0,i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    n = in; 
    vi v(n);
    vi psum(n);
    fo(i,n)
    {
        string str = in;
        v[i] = f(str);
        if(i==0) psum[i] = v[i];
        else psum[i] = psum[i-1]+v[i];
    }

    fo(i,n)
    {
        int nextVal = psum[i]+5-v[i];
        int lb = lower_bound(all(psum),nextVal) - psum.begin();
        if(lb != n && psum[lb] == nextVal && lb+1 < n)
        {
            lb++;
            nextVal = psum[lb]+7-v[lb];
            lb = lower_bound(all(psum),nextVal) - psum.begin();
            if(lb != n && psum[lb] == nextVal && lb+1 < n)
            {
                lb++;
                nextVal = psum[lb]+5-v[lb];
                lb = lower_bound(all(psum),nextVal) - psum.begin();
                if(lb != n && psum[lb] == nextVal)
                {
                    ans++;
                }
            }
        }
    }
    cout << ans << endl;
    // cout << v;
    // cout << psum;
}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    // w(t)
    // cout << f("beauties") << endl;
    solve();
    // f();
}