#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int a,b;
    cin >> a >> b;
    int arr[a];
    int ans1 = 0;
    int ans2 = 0;
    for(int i = 0; i < a; i++)
    {
        cin >> arr[i];
        ans1 += arr[i];
        if(arr[i]%b == 0) ans2 += arr[i]/b;
        else ans2 += (arr[i]/b)+1;
    }

    if(ans1%b == 0) ans1 /= b;
    else ans1 = (ans1/b)+1;

    cout << ans1 << " " << ans2 << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}