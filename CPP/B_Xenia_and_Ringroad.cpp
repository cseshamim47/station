#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n,m;
    cin >> n >> m;
    int arr[m+1];
    for (int i = 0; i < m; i++)
    {
        cin >> arr[i];
    }
    int currentIdx = 1;
    int ans = 0;
    for(int i = 0; i < m; i++)
    {
        if(currentIdx <= arr[i])
        {
            ans += arr[i]-currentIdx;
            currentIdx = arr[i];
        }else 
        {
            ans+= n-currentIdx+arr[i];
            currentIdx = arr[i];
        }
    }
    cout << ans << endl;
    
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}

