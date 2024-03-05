// In the name of ALLAH
// cseshamim47
// 12-09-2022 21:09:59


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
string str;
int start,finish;
bool cmp(pair<char,int> a, pair<char,int> b)
{

    if(a.F == b.F)
    {
        if(a.F == str[0])
        {
            if(str[0] <= str[str.size()-1]) return a.S < b.S;
            else return a.S > b.S;
        }else if(a.F == str[str.size()-1])
        {
            if(str[0] <= str[str.size()-1]) return a.S < b.S;
            else return a.S > b.S;
        }
        return a.S < b.S;
    }
    else return a.F < b.F;
}



void solve()
{
    int a=0,b=0,i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    cin >> str;
    map<char,int> alpha;
    i = 1;
    for(char ch = 'a'; ch <= 'z'; ch++)
    {
        alpha[ch] = i;
        i++;
    }

    vector<pair<char,int>> v;
    n = s(str);
    fo(i,n)
    {   
        v.pb({str[i],i+1});
    }
    sort(v.begin(),v.end(),cmp);

    vector<int> out;
    start = 0;
    finish = 0;
    int nfinish = INF;
    fo(i,n)
    {
        if(v[i].S == 1) 
        {
            start = i;
        }
        // if(v[i].F == str[n-1])
        // {
        //     finish = i;
        //     nfinish = min(i,nfinish);
        // }
        if(v[i].S == n) finish = i;
    }
    // if(str[0] > str[n-1])
    // {
    //     finish = nfinish;
    // }

    if(start <= finish)
    {
        Fo(start,start,finish+1)
        {
            out.pb(v[start].S);
            if(start+1 < finish+1)
            {
                ans += abs(alpha[v[start].F]-alpha[v[start+1].F]);
            }
        }
    }else
    {
        Fo(i,start,finish-1)
        {
            out.pb(v[i].S);
            if(i-1 > finish-1)
            {
                ans += abs(alpha[v[i].F]-alpha[v[i-1].F]);
            }
        }
    }
    cout << ans << " " << out.size() << endl;
    cout << out;

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