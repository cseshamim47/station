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
void solve()
{
    int i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0;
    n = in;
    m = in;
    vi v(n);
    map<int,int> mp;
    fo(i,n)
    {
        int x = in;
        v[i] = (x%m);
        mp[v[i]]++;
    }
    // sort(allg(v));
    bool have = false;
    // for(auto x : v) cout << x << " ";nl;
    fo(i,n)
    {
        if(v[i] == 0)
        {
            have = true;
            continue;
        }

        if(!mp[v[i]]) continue;

        // deb2(v[i],cnt);
        // deb2(mp[1],cnt);

        k = m-v[i];
        // deb2(v[i],k);
        if(k == v[i])
        {
            cnt++;
            mp[k] = 0;
        }
        else if(k == 0)
        {
            mp[v[i]] = 0;
            cnt++;
        }
        else if(mp[k])
        {
            // deb2(mp[v[i]],mp[k]);
            int mn = min(mp[k],mp[v[i]]);
            // deb(mn);
            mp[k]-=max<int>(mn,0);
            mp[v[i]]-=max<int>(mn,0);
            if(mp[k]) mp[k]--;
            else if(mp[v[i]]) mp[v[i]]--;
            cnt++;
        }else
        {
            cnt++;
            mp[v[i]]--;
        }
        // deb2(mp[v[i]],mp[k]);
    }
    if(have) cnt++;
    cout << cnt << endl;

    

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