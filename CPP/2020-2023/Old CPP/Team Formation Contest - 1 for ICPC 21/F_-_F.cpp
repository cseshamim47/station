// In the name of ALLAH
// █▀▄▀█ █▀▄   █▀ █░█ ▄▀█ █▀▄▀█ █ █▀▄▀█   ▄▀█ █░█ █▀▄▀█ █▀▀ █▀▄
// █░▀░█ █▄▀   ▄█ █▀█ █▀█ █░▀░█ █ █░▀░█   █▀█ █▀█ █░▀░█ ██▄ █▄▀
// cseshamim47
// 11-08-2022 23:29:47


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

void f()
{}

int Case;

                    // Code Starts From Here       	
vi v;
vi vv;

vector<pair<int,int>> lossa;
vector<pair<int,int>> lossb;

bool cmp(pair<int,int> a,pair<int,int> b)
{
    
    if(a.F == b.F) return (lossb[a.second] > lossb[b.second]);
    else return (a.F < b.F);
}

void solve()
{
    int a=0,b=0,i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    n = in, a = in, b = in;

    v.resize(n);
    fo(i,n)
    {
        v[i] = in;
    }

    m = n;
    vv.resize(n);
    fo(i,m)
    {
        vv[i] = in;
    }

    fo(i,n)
    {
        if(v[i] < vv[i])
        {
            lossa.pb({vv[i]-v[i],i});
            lossb.pb({0,i});
        }else
        {
            lossa.pb({0,i});
            lossb.pb({v[i]-vv[i],i});
        }        
    }

    sort(lossa.begin(),lossa.end(),cmp);
    char ch[n];
    map<int,int> mp;
    fo(i,a)
    {
        ans += v[lossa[i].S];
        mp[lossa[i].S] = 1;

        ch[lossa[i].S] = 'T';
    }

    sort(all(lossb));

    fo(i,n)
    {
        if(mp[lossb[i].S]) continue;

        if(b) 
        {
            b--;
            ans += vv[lossb[i].S];
            mp[lossb[i].S] = 1;
            ch[lossb[i].S] = 'P';
        }else break;

    }

    fo(i,n)
    {
        if(!mp[i]) 
        {
            ans += max(v[i],vv[i]);
            if(v[i] > vv[i])
            {
                ch[i] = 'T';
            }else
            {
                ch[i] = 'P';
            }
        }
            
    }


    cout << ans << endl;

    for(auto x : ch) cout << x << " ";
    nl;
    // for(auto x : lossb)
    // {
    //     cout << x.F << " " << x.S << endl;
    // }

    
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