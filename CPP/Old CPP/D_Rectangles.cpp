#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    int t = n;
    vector<pair<int,int>> v;
    set<pair<int,int>> st;
    while(t--)
    {
        int a,b;
        cin >> a >> b;
        v.push_back({a,b});
        st.insert(v.back());
    }
    sort(v.begin(),v.end());
    int ans = 0;
    for(int i = 0; i < n; i++)
    {
        for(int j = i+1; j < n; j++)
        {
            if(v[i].first < v[j].first && v[i].second > v[j].second)
            {
                if(st.find({v[i].first, v[j].second}) != st.end() && st.find({v[j].first,v[i].second}) != st.end())
                {
                    ans++;
                }
            }
        }

    }
    cout << ans << endl;
}

int32_t main()
{
      //        Bismillah
    // w(t)
    solve();
    
}