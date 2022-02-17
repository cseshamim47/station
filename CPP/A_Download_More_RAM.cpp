#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n,r;
    cin >> n >> r;
    int req[n]{0};
    int ram[n]{0};
    for(int i = 0; i < n; i++) cin >> req[i];
    for(int i = 0; i < n; i++) cin >> ram[i];
    multimap<int,int> mp;
    for(int i = 0; i < n; i++)
    {
        // mp[req[i]] = ram[i];
        mp.insert({req[i],ram[i]});
        // if(req[i]<r) r+=ram[i];
    }
    sort(req,req+n);
    for(auto x : mp)
    {
        if(x.first <= r) r+=x.second;
    }
    cout << r << endl;
   
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}