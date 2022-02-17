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
    map<string,int> m;

    for(int i = 0; i < n; i++)
    {
        string str;
        cin >> str;
        if(m[str] == 1) cout << "YES" << endl;
        else cout << "NO" << endl;
        m[str] = 1;
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}