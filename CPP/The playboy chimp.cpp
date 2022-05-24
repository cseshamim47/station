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
    for(int i = 0; i < n; i++) cin >> arr[i];
    int q;
    cin >> q;
    while(q--)
    {
        int h;
        cin >> h;
        int lb = lower_bound(arr,arr+n,h) - arr;
        lb--;
        if(lb >= 0) cout << arr[lb] << " ";
        else cout << "X ";
        lb = upper_bound(arr,arr+n,h) - arr;
        if(lb == n) cout << "X" << endl;
        else cout << arr[lb] << endl;
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}