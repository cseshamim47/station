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

    for(int i = 3; i <= n; i++)
    {
        if(arr[i-2] < arr[i-1] && arr[i-1] > arr[i])
        {
            cout << "YES" << endl;
            cout << i-2 << " " << i-1 << " " << i << endl;
            return;
        }
    }
    cout << "NO" << endl;

}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}