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
    map<int,int> mp;
    bool ok = false; 
    for(int i = 0; i < n; i++)
    {
        int x;
        cin >> x;
        mp[x]++;
        if(mp[x] == 2)
        {
            ok = true;
        }
    }
    cout << (ok ? "YES" : "NO") << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}