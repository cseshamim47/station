#include <bits/stdc++.h>
using namespace std;

void solve()
{
    int n;
    cin >> n;
    vector<pair<int,int>> v(n+1);
    for (int i = 1; i <= n; i++)
    {
        cin >> v[i].first >> v[i].second;
    }
    vector<vector<int>> dp(32,vector<int>(n+2,0));


    for (int kg = 1; kg <= 30; kg++)
    {
        for (int i = 1; i <= n; i++)
        {
            int price = v[i].first;
            int weight = v[i].second;

            int jodiNei = 0;
            if(kg-weight >= 0) jodiNei = price + dp[kg-weight][i-1];
            dp[kg][i] = max(jodiNei, dp[kg][i-1]);
        } 
    }
    int k;
    cin >> k;
    int ans = 0;
    while(k--)
    {
        int wt;
        cin >> wt;
        ans += dp[wt][n];
    }    
    cout << ans << endl;
    
}

int main()
{
    //    Bismillah
    int t;
    cin >> t;
    while(t--) solve();
}