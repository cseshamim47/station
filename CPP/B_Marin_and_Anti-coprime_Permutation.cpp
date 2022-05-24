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

void f()
{}

int Case;
void solve()
{
    int n;
    cin >> n;
    if(n&1)
    {
        cout << 0 << endl;
        return;
    }

    int even = n/2;
    int odd = even;
    int ans = 1;
    for(int i = 1; i <= even; i++)
    {
       ans = ((ans%998244353) * (i%998244353)) % 998244353;
    } 
    ans = ((ans%998244353) * (ans%998244353)) % 998244353;
    cout << ans << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
    //f();
}