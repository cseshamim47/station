#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n,x;
    cin >> n >> x;
    int arr[1005]{0};
    for(int i = 1; i <= n; i++)
    {
        int put;
        cin >> put;
        arr[put] = 1;
    }
    int ans = INT_MIN/2;
    int go = x+n;
    for(int i = 1; i <= go; i++)
    {
        x--;
        if(arr[i]) x++;
        ans = max(ans,i);
        if(x==0 && arr[i+1] == 0) break;
    }
    cout << ans << endl;

}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}