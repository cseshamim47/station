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
    vector<int> allDistance;
    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < m; j++)
        {
            int topLeft = i+j;
            int topRight = i+m-1-j;
            int bottomLeft = n-1-i+j;
            int bottomRight = n-1-i+m-1-j;
            allDistance.push_back(max({topLeft,topRight,bottomLeft,bottomRight}));
        }
    }
    sort(allDistance.begin(),allDistance.end());
    for(auto &i : allDistance)
    {
        cout << i << " ";
    }
    cout << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}