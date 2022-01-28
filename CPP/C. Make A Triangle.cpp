#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    double arr[4];
    cin >> arr[0] >> arr[1] >> arr[2] >> arr[3];
    
    sort(arr,arr+4);

    double s = (arr[3]+arr[1]+arr[2])/2;
    int a = arr[3];
    int b = arr[1];
    int c = arr[2];
    long double ans = sqrt(s*(s-a)*(s-b)*(s-c));

    cout << setprecision(2) << fixed << ans << endl;

}

int32_t main()
{
      //        Bismillah
    BOOST
    w(t)
    //solve();
}