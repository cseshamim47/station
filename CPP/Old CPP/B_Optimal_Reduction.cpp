// In the name of ALLAH
// █▀▄▀█ █▀▄   █▀ █░█ ▄▀█ █▀▄▀█ █ █▀▄▀█   ▄▀█ █░█ █▀▄▀█ █▀▀ █▀▄
// █░▀░█ █▄▀   ▄█ █▀█ █▀█ █░▀░█ █ █░▀░█   █▀█ █▀█ █░▀░█ ██▄ █▄▀
// cseshamim47
// 06-08-2022 21:10:34


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

int f(vector<int> &v)
{
    int sum = 0;
    int op = 0;
    for(int i = 0; i < v.size(); i++)
    {
        sum += abs(sum-v[i]);
    }
    return sum;
}

int Case;

                    // Code Starts From Here       	

void solve()
{
    int a=0,b=0,i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    n = in;
    vi v(n);
    int mn = INT_MAX;
    fo(i,n)
    {
        v[i] = in;
        mn = min(mn,v[i]);
    }

    
    Fo(i,0,n)
    {
        v[i] -= mn;
    }

    vi psum(n);
    fo(i,n)
    {
        if(i == 0) psum[i] = v[i];
        else psum[i] = psum[i-1] + v[i];
    }
    // cout << psum;
    // nl;
    // if(n < 3) 
    // {
    //     YES;
    //     return;
    // }

    Fo(i,0,n)
    {
        if((v[i] == 0 && psum[i] != 0 && psum[n-1]-psum[i] != 0) || (i != 0 && i != n-1 && v[i-1] > v[i] && v[i] < v[i+1]) )
        {
            NO;
            return;
        }
    }
    YES;

    // cout << v;
    // nl;
    
    // if(v[0] && v[n-1] && n > 2) NO;
    // else YES;

    // Fo(i,1,n-1)
    // {
    //     if(v[i-1] > v[i] && v[i] < v[i+1])
    //     {
    //         NO;
    //         return;
    //     }
    // }
    // YES;

    // int ii = -1;
    // k = INT_MAX;
    // fo(i,n)
    // {
    //     if(k >= v[i])
    //     {
    //         ii = i;
    //         k = v[i];
    //     }
    // }
    // k = INT_MAX;
    // int jj = 0;
    // fo(i,n)
    // {
    //     if(k >= v[i] && i != ii)
    //     {
    //         jj = i;
    //         k = v[i];
    //     }
    // }
    
    // cout << ii << " " << jj << endl;

    // if(abs(ii-jj) > 1 || (n-max(ii,jj)-1 > 0 && (min(ii,jj) > 0)))
    // {
    //     NO;
    // }else
    //     YES;




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