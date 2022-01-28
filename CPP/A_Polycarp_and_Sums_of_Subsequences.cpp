#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n = 7;
    vector<int> v;
    for(int i = 0; i < 7; i++)
    {
        int x;
        cin >> x;
        v.push_back(x);
    }

    if(v[0]+v[1] != v[2])
    {
        cout << v[0] << " " << v[1] << " " << v[2] << endl;
    }
    else
    {
        cout << v[0] << " " << v[1] << " " << v[3] << endl;
    }

}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}