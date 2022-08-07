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
    unordered_map<string,int> mp;

    for(int i = 0; i < n; i++)
    {
        string str;
        cin >> str;
        mp[str]++;
        if(mp[str]>1) cout << str << mp[str]-1 << endl;
        else cout << "OK" << endl;
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}