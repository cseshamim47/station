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
    // cout << (1 << 3) << endl;
    for(int i = 2; i < 32; i++)
    {
        int sum = (1 << i)-1;
        if(sum <= n && n%sum == 0) 
        {
            cout << n/sum << endl;
            return;
        }
    }
}
// 1 + 2 = 3 = 6 - 3 = 3/3
int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    // solve();
}