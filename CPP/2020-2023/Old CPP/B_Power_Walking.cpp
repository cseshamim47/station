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
    for(int i = 0; i < n; i++)
    {
        int x;
        cin >> x;
        mp[x]++;
    }
    for(int k = 1; k <= n; k++)
    {
        if(k < mp.size())
        {
            cout << mp.size() << " ";
        }else cout << k << " ";
    }
    cout << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}