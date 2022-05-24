#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

int Case;
void solve()
{
    int n,q;
    cin >> n >> q;
    vector<int> v(n,0);
    for(int i = 0; i < n; i++) cin >> v[i];
    cout << "Case " << ++Case << ":" << endl;
    while(q--)
    {
        int a,b;
        cin >> a >> b;
        auto lb = lower_bound(v.begin(),v.end(),a);
        auto ub = upper_bound(v.begin(),v.end(),b);
        cout << ub-lb << endl;
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}