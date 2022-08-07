#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int a,b,k;
    cin >> a >> b >> k;
    if(k == 0 && max(a,b) == 1) 
    {
        cout << "NO" << endl;
        return;
    }
    int dist = abs(a-b)+1;
    if(a==b) cout << "YES" << endl;
    else if(dist>2 && k == 0) cout << "NO" << endl;
    else if(a&1 && b&1 && (dist+1)/2 > k) cout << "NO" << endl;
    else if(dist/2>k) cout << "NO" << endl;
    else cout << "YES" << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}