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
    int arr[n][m];
    // cout << "I'm here" << endl;
    vector<vector<int>> x;
    vector<vector<int>> y;
    x.resize(1e5+10, vector<int>());
    y.resize(1e5+10, vector<int>());

    set<int> s;
    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < m; j++)
        {
            int k;
            cin >> k;
            x[k].push_back(i);
            y[k].push_back(j);
            s.insert(k);
        }
    }
    int cnt = 0;
    for(auto q : s)
    {
        vector<int> v = x[q];
        sort(v.begin(),v.end());

        int sum = 0;
        for(int i = 0; i < v.size(); i++) sum+=v[i];
        int sz = v.size();
        for(int i = 0; i < sz; i++)
        {
            sum -= v[i];
            cnt += (sum - (v[i]*(sz-i-1)));
        }
        vector<int> b = y[q];
        sort(b.begin(),b.end());

        sz = b.size();
        sum = 0;
        for(int i = 0; i < sz; i++) sum+=b[i];
        for(int i = 0; i < sz; i++)
        {
            sum -= b[i];
            cnt += (sum - (b[i]*(sz-i-1)));
        }
        // cout << cnt << endl;

    }
    cout << cnt << endl;


}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}