#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int a, b;
    cin >> a >> b;
    int cnt = a-1;
    int res = cnt;

    if(cnt % 4 == 0) res = cnt;
    else if(cnt % 4 == 1) res = 1;
    else if(cnt % 4 == 2) res = cnt + 1;
    else res = 0;

    if(res==b) cout << a << endl;
    else if((res^a) == b) cout << a+2 << endl;
    else cout << a+1 << endl;
   
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}