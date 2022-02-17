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
    vector<int> v;
    for(int i = 0; i < n; i++)
    {
        int x;
        cin >> x;
        v.push_back(x);
    } 
    map<int,int> mp;
    for(int i = 0; i < n; i++)
    {
        int val = v[i];
        while(val > n)
        {
            
            val /= 2;
        }
        while(mp[val] == 1) val/=2;
        if(val > 0) mp[val] = 1;
    }
    int cnt = 1;
    for(int i = 1; i <= n; i++) 
    if(mp[i] == 1) cnt++;
    else break;
    if(cnt == n+1) cout << "YES" << endl;
    else cout << "NO" << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}