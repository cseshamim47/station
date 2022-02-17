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
    vector<int> v(n,0);
    for(int i = 0; i < n; i++) cin >> v[i];
    sort(v.begin(),v.end());
    int maxMin = v[0];
    int conSum = v[0];
    for(int i = 1; i < n; i++)
    {
        v[i]-=conSum;
        maxMin = max(maxMin,v[i]);
        conSum+=v[i];
    }
    cout << maxMin << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    // solve();
}