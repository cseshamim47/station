#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    string str;
    cin >> str;

    if(str.size() == 4) cout << str << endl;
    else
    {
        int32_t sz = str.size();
        sz = 4 - sz;
        while(sz--)
        {
            cout << 0;
        }
        cout << str << endl;
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}