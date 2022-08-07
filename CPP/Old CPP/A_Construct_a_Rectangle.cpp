#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int arr[3];
    cin >> arr[0] >> arr[1] >> arr[2];

    sort(arr,arr+3);

    if((arr[0] == arr[1] && arr[2] % 2 == 0) || (arr[1] == arr[2] && arr[0] % 2 == 0))
    {
        cout << "YES" << endl;
    }
    else if(arr[2] - arr[1] == arr[0])
    {
        cout << "YES" << endl;
    }
    else 
        cout << "NO" << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}