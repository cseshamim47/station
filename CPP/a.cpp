#include <bits/stdc++.h>
using namespace std;

#define fo(i,n) for(i=0;i<n;i++)
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
void solve()
{
    int i,j,m,n;
    n = in;
    m = in;
    int problem[n];
    int order[n];
    int mod[n];

    fo(i,n) cin >> problem[i];
    fo(i,n) cin >> order[i];
    int sum = 0;
    bool same = false;
    set<int> s;
    fo(i,n) 
    {
        mod[i] = problem[i]%m;
        sum += mod[i];
        s.insert(mod[i]);
    }
    // deb(sum);
    
    int ans = 0;
    fo(i,n-1)
    {
        if(sum == 0) break;
        ans++;
        sum -= mod[order[i]-1];
    }
    if(s.size() == 1) ans = 0;
    cout << ans << endl;
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