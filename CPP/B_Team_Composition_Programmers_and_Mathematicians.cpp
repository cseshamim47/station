#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int a,b;
    cin >> a >> b;
    if(a < b) swap(a,b);

    int sum = (a+b)/4;
    cout << min(sum,b) << endl;


}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    // solve();
}