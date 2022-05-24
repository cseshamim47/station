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
    vector<int> v(n+5,0);
    v[0] = INT_MIN;
    for (int i = 1; i <= n; i++)
    {
        cin >> v[i];
    }

    if(is_sorted(v.begin(),v.end())) cout << 0 << endl;
    else if(v[n-1] <= v[n] && v[n] >= 0)
    {
        cout << n-2 << endl;
        for(int i = 1; i <= n-2; i++)
        {
            cout << i << " " << n-1 << " " << n << endl;
        }
    }else cout << -1 << endl;
    
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}