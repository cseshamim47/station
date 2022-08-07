#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006
const int N = 1e5+10;

vector<pair<int,int>> adj[N];

void solve()
{
    int n;
    cin >> n;
    map<int,int> mp;
    for(int i = 1; i < n; i++)
    {
        int x,y;
        cin >> x >> y;
        adj[x].push_back({x})
        mp[x]++;
        mp[y]++;
        if(mp[x]>2 || mp[y]>2)
        {
            cout << -1 << endl;
            return;
        }
    }
    for(int i = 1; i < n; i++)
    {
        if(i%2 == 0)
        {
            cout << 5 << " ";
        }else cout << 2 << " ";
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