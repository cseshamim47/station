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
    int arr[n+1];
    for(int i = 1; i <= n; i++)
    {
        cin >> arr[i];
    }

    int ans = 0;
    for(int i = 1; i <= n; i++)
    {
        // if(arr[i] < arr[i+1])
        int mx;
        if(i&1)
        {
            mx = abs(arr[i]-i)+1;
        } else mx = abs(arr[i]-i);

        cout << arr[i] << " " << mx << endl;

        ans = max(ans,mx);
    }
    // if(ans == 1) ans = 0;
    cout << ans << endl;
    
}




int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}