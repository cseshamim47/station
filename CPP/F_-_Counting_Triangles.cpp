#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

int Case;
void solve()
{
    int n;
    cin >> n;
    int arr[n];
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }
    sort(arr,arr+n);
 
    int cnt = 0;
    for(int i = 0; i < n-2; i++)
    {
        for(int j = i+1; j < n-1; j++)
        {
            int sum = arr[i]+arr[j];
            int idx = lower_bound(arr,arr+n,sum) - arr;

            cnt += idx;
            cnt -= j+1;
            // cout << i << " " << j << " " << idx << " " << idx-(j+1) << endl;

        }
    }

    cout << "Case " << ++Case << ": " << cnt << endl;

    // 1 2 3 4 5 6 7 8 10
    
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}