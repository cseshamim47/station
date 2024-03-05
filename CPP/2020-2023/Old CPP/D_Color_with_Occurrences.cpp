// In the name of ALLAH
// █▀▄▀█ █▀▄   █▀ █░█ ▄▀█ █▀▄▀█ █ █▀▄▀█   ▄▀█ █░█ █▀▄▀█ █▀▀ █▀▄
// █░▀░█ █▄▀   ▄█ █▀█ █▀█ █░▀░█ █ █░▀░█   █▀█ █▀█ █░▀░█ ██▄ █▄▀
// cseshamim47
// 01-08-2022 21:24:03


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

void solve()
{
    int i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    string str = in;
    n = s(str);
    m = in;
    map<char,vector<string> > mp;
    vector<string> sv;
    fo(i,m)
    {
        string tmp = in;
        sv.pb(tmp);
        mp[tmp[0]].push_back(tmp);
    }

    bool ok = true;
    int marked = -1;
    vector<pair<int,int>> out;
    fo(i,n)
    {
        // if(i < marked) i = marked;
        comehere:
        // cout << i << endl;
        // getchar();
        char c = str[i];
        if(mp.count(c))
        {
            auto v = mp[c];
            int tempMarked = -1;
            for(auto x : v)
            {
                int sz = x.size();
                
                if(str.substr(i,sz) == x)
                {
                //    cout <<  str.substr(i,sz);
                //    nl;
                    tempMarked = max<int>(tempMarked,i+sz-1);

                    // i = i+sz;
                }
            }
            if(tempMarked>marked)
            {
                marked = tempMarked;
                fo(k,m)
                {
                    if(sv[k] == str.substr(i,marked-i+1))
                    {
                        out.pb({k+1,i+1});
                        break;
                    }
                }
                i = marked;
                cnt++;
            }
            else if(i > 0)
            {
                i--;
                goto comehere;
            }
            else 
            {
                ok = false;
                cout << -1 << endl;
                return;
            }
        }else if(i == 0)
        {
            ok = false;
            cout << -1 << endl;
            return;
        }else
        {
            i--;
            goto comehere;
        }

    }

    cout << out.size() << endl;
    for(auto x : out)
    {
        cout << x.F << " " << x.S << endl;
    }




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



// 6
// bababa
// 2
// ba
// aba

// caba
// 2
// bac
// acab

// abacabaca
// 3
// aba
// bac
// aca
// baca
// 3
// a
// c
// b
// codeforces
// 4
// def
// code
// efo
// forces
// aaaabbbbcccceeee
// 4
// eeee
// cccc
// aaaa
// bbbb