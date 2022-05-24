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

    
    string a = in, b = in;
    // // cout << a << endl; 
    // // cout << b << endl; 
    map<char,set<int>> ma;
    map<char,set<int>> mb;
    fo(i,n)
    {
        // if(a[i] == '?') mb['?']++;
        ma[a[i]].insert(i+1);
        mb[b[i]].insert(i+1);
    }

    sort(all(a),greater<int>());
    sort(all(b),greater<int>());

    int cnt = 0;
    int cnt2 = 0;
    vector<pair<int,int>> v;
    fo(i,n)
    {
        if(mb[a[i]].size() > 0)
        {
            cnt++;
            // cout << *ma[a[i]].begin() << " " << *mb[a[i]].begin() << endl;
            v.push_back({*ma[a[i]].begin(),*mb[a[i]].begin()});
            mb[a[i]].erase(*mb[a[i]].begin());
            ma[a[i]].erase(*ma[a[i]].begin());
            if(mb[a[i]].size() == 0) mb.erase(a[i]);
        }else if(mb['?'].size())
        {
            cnt++;
            // cout << *ma[a[i]].begin() << " " << *mb['?'].begin() << endl;
            v.push_back({*ma[a[i]].begin(),*mb['?'].begin()});
            mb['?'].erase(*mb['?'].begin());
            ma[a[i]].erase(*ma[a[i]].begin());
            if(mb['?'].size() == 0) mb.erase('?');
            if(ma[a[i]].size() == 0) ma.erase(a[i]);
        }
    }
        
    fo(i,n)
    {
        if(mb[b[i]].size() && ma['?'].size())
        {
            cnt++;
            v.push_back({*ma['?'].begin(),*mb[b[i]].begin()});
            ma['?'].erase(*ma['?'].begin());
            mb[b[i]].erase(*mb[b[i]].begin());
            if(ma['?'].size() == 0) ma.erase('?');
            if(mb[b[i]].size() == 0) mb.erase(b[i]);
        }
    }

    cout << cnt << endl;
    for(auto x : v)
    {
        cout << x.first << " " << x.second << endl;
    }
    // pl(cnt);
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