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
    int kadane = 1;
    int ans = 1;
    cin >> arr[0];
    for(int i = 1; i < n; i++)
    {
        cin >> arr[i];
        if(arr[i] > arr[i-1]) kadane++;
        else kadane = 1;

        ans = max(ans,kadane);
    }
    cout << ans << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}