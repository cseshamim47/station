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
    vector<int> v;
    bool isAdded = false;
    for(int i = n-1; i >= 1; i--)
    {
        v.push_back(i);
        if(__builtin_popcount(i) == 1 && !isAdded)
        {
            v.push_back(0);
            isAdded = true;
        }
    }
    for(auto x : v) cout << x << " ";
    cout << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}