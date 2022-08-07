#include <bits/stdc++.h>
using namespace std;

#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

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
    int n,m;
    cin >> n >> m;

    int a[n],b[m];
    map<int,int> mp;
    for(int i = 0; i < n; i++) 
    {
        cin >> a[i];
        mp[a[i]]++;
    }

    for(int i = 0; i < m; i++)
    {
        cin >> b[i];
        mp[b[i]]--;
    }

    int cnt = 0;
    for(auto x : mp)
    {
        cnt += abs(x.second);
    }
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