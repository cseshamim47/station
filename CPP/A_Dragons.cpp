#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int k,d;
    cin >> k >> d;

    vector<pair<int,int>> v; 
    for (int i = 0; i < d; i++)
    {
        int a, b;
        cin >> a >> b;
        v.push_back({a,b});
    }

    sort(v.begin(),v.end());

    for(int i = 0; i < d; i++)
    {
        if(v[i].first < k)
        {
            k+=v[i].second;
        }else
        {
            cout << "NO" << endl;
            return;
        }
    }

    cout << "YES" << endl;


    
    
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}