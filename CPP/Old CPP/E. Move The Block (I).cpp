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
    for (int i = 1; i <= n; i++)
    {
        cin >> arr[i];
    }

    int q;
    cin >> q;
    while(q--)
    {
        int sum = 0;
        int l,r;
        cin >> l >> r;

        for(int i = l; i < r; i++)
        {
            sum += (i+1-l)*arr[i+1];
        }
        cout << sum << endl;
    }
    
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    // solve();
}