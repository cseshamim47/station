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

    int sum = 0;

    for(int i = 0; i < n; i++)
    {
        int x;
        cin >> x;
        sum += x;
    }
    if(sum == n) cout << 0 << endl;
    else if(sum < n) cout << 1 << endl;
    else cout << sum - n << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}