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
    for (int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }

    int cnt = 1;
    int i = 0;
    for(i = n-2; i >= 0; i--)
    {
        if(arr[i] == arr[i+1]) cnt++;
        else break;
    }
    int ans = 0; 
    int last = arr[n-1];
    while(i>=0)
    {
        ans++;
        i -= cnt;
        cnt *= 2;
        while(i >= 0 && arr[i] == last) i--,cnt++;
    }
    cout << ans << endl;
    
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    // solve();
}