#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int arr[4];
    int h;
    for(int i = 0; i < 4; i++) cin >> arr[i];
    cin >> h;
    sort(arr,arr+4,greater<int>());
    int sum = arr[0]+arr[1]+arr[2];
    if(sum >= h) cout << "WAW" << endl;
    else cout << "AWW" << endl;

}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}