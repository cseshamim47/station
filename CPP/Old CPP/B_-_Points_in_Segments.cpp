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
    int n,q;
    cin >> n >> q;
    int arr[n];
    for(int i = 0; i < n; i++) cin >> arr[i];

    sort(arr,arr+n);
    cout << "Case " << ++Case << ":" << endl;
    while(q--)
    {
        int a,b;
        cin >> a >> b;
        cout << upper_bound(arr,arr+n,b) - lower_bound(arr,arr+n,a) << endl;
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}