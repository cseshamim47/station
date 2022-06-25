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
#define MAX 100005

struct{
    template<class T> operator T() {
        T x;
        cin >> x;
        return x;
    }
}in;

bool f(int k,int n,vi &v, vi &vv)
{
    int sum1 = 0, sum2 = 0;
    int i = 0,q = 0;
    
    sum1 = 100*k;

    q = (n+k);
    q = q - (q/4);

    sum2 = vv[min(q,n)-1];

    q -= k;
    if(q > 0)
    sum1 += v[q-1];

    if(sum1 >= sum2) return true;
    else return false;
}

int Case;
void solve()
{
    int i=0,j=0,k=0,n = 0, m = 0,ans=0,cnt=0,odd=0,even=0;
    n = in;
    vi v(n);
    fo(i,n)
    {
        v[i] = in;
    }

    m = n;
    vi vv(m);
    fo(i,m) vv[i] = in;	

    sort(allg(v));
    sort(allg(vv));

    fo(i,n)
    {
        if(i != 0)
        {
            v[i] += v[i-1];
            vv[i] += vv[i-1];
        }
    }

    int l = 0, r = n;
    while(l < r)
    {
        int mid = l+((r-l)/2);
        if(f(mid,n,v,vv))
        {
            r = mid;
        }else
        {
            l = mid+1;
        }
    }
    cout << r << endl;
    

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