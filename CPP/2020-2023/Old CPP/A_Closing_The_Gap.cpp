#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    int ans = 0;
    for (size_t i = 0; i < n; i++)
    {
        int x;
        cin >> x;
        ans += x;
    }
    if(ans%n == 0) cout << 0 << endl;
    else cout << 1 << endl;
    
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}