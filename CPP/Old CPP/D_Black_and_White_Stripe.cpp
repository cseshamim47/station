#include <bits/stdc++.h>
#include <ext/pb_ds/assoc_container.hpp>
using namespace std;
using namespace __gnu_pbds;

#define int long long
#define ll unsigned long long
typedef tree<int, null_type, less_equal<int>, rb_tree_tag, tree_order_statistics_node_update > ordered_set;
// less_equal = multiset, less = set, greater_equal = multiset decreasing, greater = set decreaseing
/// cout<<*X.find_by_order(1)<<endl; // iterator to the k-th element
/// cout<<X.order_of_key(-5)<<endl;  // number of items in a set that are strictly smaller than our item
#define fo(i,n) for(i=0;i<n;i++)
#define Fo(i,k,n) for(i=k;k<n?i<n:i>n;k<n?i+=1:i-=1)
#define pi(x)	printf("%d\n",x)
#define pl(x)	printf("%lld\n",x)
#define plg(x)	printf("%lld ",x)
#define ps(s)	printf("%s\n",s)
#define Y printf("YES\n")
#define N printf("NO\n")
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
#define MAX 1000006

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
void solve()
{
    int i=0,j=0,m=0,n=0,k=0,ans=INT_MAX,cnt=0,odd=0,even=0;
    n = in, m = in;
    string str = in;
    ans = m;
    int w = 0, b = 0;
    int sum[n]={0};
    fo(i,n)
    {   
        if(i == 0) (str[i] == 'B'? sum[i] = 1 : sum[i] = 0);
        else 
        {
            (str[i] == 'B'? sum[i] = sum[i-1]+1 : sum[i] = sum[i-1]);
        }   
    }

    int l = 0;
    Fo(i,m-1,n)
    {
        if(i == m-1)
        {
            ans = m-sum[i];
        }else
        {
            cnt = sum[i]-sum[l++];
            // deb(cnt);
            ans = min<int>(m-cnt,ans);

        }
    }

    // ans = min<int>(m-cnt,ans);
    // for(auto x : sum ) cout << x << " ";
    
    cout << ans << endl;
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