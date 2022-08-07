#include <bits/stdc++.h>
#include <ext/pb_ds/assoc_container.hpp>
using namespace std;
using namespace __gnu_pbds;

#define int long long
#define ll unsigned long long
#define MAX 1000006
typedef tree<int, null_type, less_equal<int>, rb_tree_tag, tree_order_statistics_node_update > ordered_set;
// less_equal = multiset, less = set, greater_equal = multiset decreasing, greater = set decreaseing
/// cout<<*X.find_by_order(1)<<endl; // iterator to the k-th largest element
/// cout<<X.order_of_key(-5)<<endl;  // number of items in a set that are strictly smaller than our item
#define fo(i,n) for(i=0;i<n;i++)
#define Fo(i,k,n) for(i=k;k<n?i<n:i>n;k<n?i+=1:i-=1)
#define pi(x)	printf("%d\n",x)
#define pl(x)	printf("%lld\n",x)
#define plg(x)	printf("%lld ",x)
#define ps(s)	printf("%s\n",s)
#define Y printf("YES\n");
#define N printf("NO\n");
#define vi vector<int>
#define pb push_back
#define pf push_front
#define deb(x) cout << #x << "=" << x << endl
#define deb2(x, y) cout << #x << "=" << x << "," << #y << "=" << y << endl
#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define nl printf("\n");
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }

struct{
    template<class T> operator T() {
        T x;
        cin >> x;
        return x;
    }
}in;

void fileInput()
{
    #ifndef ONLINE_JUDGE
        freopen("input.txt", "r", stdin);
        freopen("output.txt", "w", stdout);
    #endif
}

int gcd(int a, int b)
{
    if(!b) return a;
    return gcd(b,a%b);
}

void f()
{}

int Case;
void solve()
{
    int i,j,m,n;
    n = in;
    vi v(n+1);
    map<int,int> mp;
    int key = -1;
    int val = -1;
    fo(i,n)
    {
        v[i] = in;
        mp[v[i]]++;
        if(mp[v[i]] >= key)
        {
            val = v[i];
            key = mp[v[i]];
        }
    }
    v[n] = val;
    vector<pair<int,int>> ans1;
    vector<pair<int,int>> ans2;
    vector<int> track;

    Fo(i,1,n)
    {
        if(v[i] == val)
        {
            if(v[i-1] != val)
            {
                if(v[i-1] > val)
                {
                    ans2.pb({i,i+1});
                    track.pb(2);
                }else
                {
                    ans1.pb({i,i+1});
                    track.pb(1);
                }
                v[i-1] = val;
            }
            if(v[i+1] != val)
            {
                if(v[i+1] > val)
                {
                    ans2.pb({i+2,i+1});
                    track.pb(2);
                }else
                {
                    ans1.pb({i+2,i+1});
                    track.pb(1);
                }
                v[i+1] = val;
            }
        }
    }

    Fo(i,n-1,0)
    {
        if(v[i] == val)
        {
            if(v[i-1] != val)
            {
                if(v[i-1] > val)
                {
                    ans2.pb({i,i+1});
                    track.pb(2);
                }else
                {
                    ans1.pb({i,i+1});
                    track.pb(1);
                }
                v[i-1] = val;
            }
        }
    }

    int oneIdx = 0;
    int twoIdx = 0;
    cout << ans1.size()+s(ans2) << endl;
    for(int i = 0; i < track.size(); i++)
    {
        if(track[i] == 1)
        {
            cout << 1 << " " << ans1[oneIdx].first << " " << ans1[oneIdx++].second << endl; 
        }else
            cout << 2 << " " << ans2[twoIdx].first << " " << ans2[twoIdx++].second << endl; 
    }   

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