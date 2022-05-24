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
    sort(arr,arr+n,greater<int>());
    bool ok = false;
    int i = 0, j = n-1;
    int x = 0;
    int cnt = n/2;
    if(n <= 2) cnt = 0;
    else if(n%2 == 0) cnt--;
    cout << cnt << endl;
    while(x != n)
    {
        if(!ok)
        {
            cout << arr[i++] << " ";
            ok = true;
        }else
        {
            cout << arr[j--] << " ";
            ok = false;
        }
        x++;
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}