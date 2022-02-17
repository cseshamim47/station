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
    sort(arr,arr+n);
    int days;
    cin >> days;
    for(int i = 0; i < days; i++)
    {
        int x;
        cin >> x;
        int lb = upper_bound(arr,arr+n,x)-arr; 
        if(lb == 0) cout << 0 << endl;
        else cout << lb << endl;
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}