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
    int arr[n];
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }

    map<int,int> mp;

    int ans = -1;
    for (int i = 0; i < n; i++)
    {
        if(mp.count(arr[i]))
        {
            ans = max(ans,mp[arr[i]]+n-i);
        }
        mp[arr[i]] = i;
    }

    cout << ans << endl;
    
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    // solve();
}