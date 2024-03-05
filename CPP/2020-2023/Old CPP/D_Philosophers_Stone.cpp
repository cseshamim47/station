#include <bits/stdc++.h>
using namespace std;

void solve()
{
    int n,m;
    cin >> n >> m;
    int c[n+1][m+1];

    for(int i = 1; i <= n; i++)
    {
        for(int j = 1; j <= m; j++)
        {
            cin >> c[i][j];
        }
    }

    vector<vector<int>> dp(n+2,vector<int>(m+2,0));


    for(int i = n; i >= 1; i--)
    {
        for(int j = 1; j <= m; j++)
        {
            dp[i][j] = c[i][j] + max(max(dp[i+1][j],dp[i+1][j+1]), dp[i+1][j-1]);
        }
    }

    int ans = 0;
    for(int i = 1; i <= m; i++)
    {
        ans = max(ans,dp[1][i]);
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