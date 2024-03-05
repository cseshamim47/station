#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n,k;
    cin >> n >> k;
    vector<pair<int,int>> v;
    for(int i = 0; i < n; i++)
    {
        int x,y;
        cin >> x >> y;
        v.push_back({x,y});
    }
    
    for(int i = 0; i < n; i++)
    {
        bool notPossible = false;
        for (int j = 0; j < n; j++)
        {
            int a = abs(v[i].first-v[j].first)+abs(v[i].second-v[j].second);
            if(a <= k)
            {
               continue;
            }else notPossible = true;
        }
        if(!notPossible) 
        {
            cout << 1 << endl;
            return;
        }
    }
    cout << -1 << endl;
    
    
    
}



int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}