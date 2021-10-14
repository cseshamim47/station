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
    int abc[4] = {0};
    abc[0] = -1000;
    cin >> n >> abc[1] >> abc[2] >> abc[3];
    sort(abc,abc+4);

    int cnt = 0;
    int x = n % abc[1];
    if(binary_search(abc,abc+4,x))
    {
        cnt = n/abc[1];
        n %= 
        cnt += n/(n%abc[1]);
    }
    cout << cnt << endl;

}
// 29 5 5 2

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}