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
        int x;
        cin >> x;

        int lb = lower_bound(arr,arr+n,x) - arr;
        if(lb > 0) 
        {
            // cout << lb << endl;
            if(lb == n || arr[lb] >= x) lb--;
            cout << arr[lb] << " ";
        }
        else cout << "X" << " ";

        lb = upper_bound(arr,arr+n,x) - arr;

        if(lb < n)
        {
            cout << arr[lb];
        } 
        else cout << "X";

        cout << endl;
    }
    
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}