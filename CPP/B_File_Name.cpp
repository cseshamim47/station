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
    string str;
    cin >> n >> str;

    int cnt = 0;
    int found = str.find("xxx");
    while(found != string::npos)
    {
        cnt++;
        found = str.find("xxx",found+1);
    }
    cout << cnt << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}