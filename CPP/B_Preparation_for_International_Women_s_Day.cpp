#include <bits/stdc++.h>
using namespace std;

#define fo(i,n) for(i=0;i<n;i++)
#define vi vector<int>
#define deb(x) cout << #x << "=" << x << endl
#define deb2(x, y) cout << #x << "=" << x << "," << #y << "=" << y << endl
#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

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
void solve() /// couldn't solve myself(saw editorial)
{
    int i,j,m,n;
    n = in;
    m = in;
    vi v(n);
    map<int,int> mp;
    for(int i = 0; i < n; i++)
    {
        cin >> v[i];
        mp[v[i]%m]++;
    }

    int ans = mp[0]/2;

    if(m%2 == 0)
    ans += mp[m/2]/2;

    for(int i = 1; i < (m+1)/2; i++)
    {
        int j = m-i;
        ans += min(mp[i],mp[j]);
    }

    cout << ans*2 << endl;
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