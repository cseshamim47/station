#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n,k;
    cin >> n >> k;
    int arr[n];
    map<int,int> mp;
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
        mp[arr[i]]++;
    }
    sort(arr,arr+n);
    int cnt = 0;
    for(int i = 0; i < n; i++)
    {
       int add = arr[i]*k;
       if(mp[arr[i]] <= 0) continue;
        if(mp[add] > 0)
        {
            mp[add]--;
        }else if(arr[i]%k == 0 && mp[arr[i]/k] > 0)
        {
            mp[arr[i]/k]--;
        }
        else
        {
            cnt++;
        }
        mp[arr[i]]--;
    }
    cout << cnt << endl;

}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}