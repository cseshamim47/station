#include <bits/stdc++.h>
using namespace std;


int n,m;
int f(int i, int j, vector<vector<int>> &c)
{
    if(j == m+1 || j <= 0)
    {
        return 1e6;
    }
    if(i == n+1) return 0;

    int k = min(min(f(i+1,j-1,c),f(i+1,j,c)),f(i+1,j+1,c));
    return c[i][j] + k;
}


int main()
{
    //    Bismillah
    cin >> n >> m;
    vector<vector<int>> c(n+1,vector<int>(m+1));
    vector<vector<int>> dp(n+2,vector<int>(m+2,1e6));

    for(int i = 1; i <= n; i++)
    {
        for (int j = 1; j <= m; j++)
        {
            cin >> c[i][j];
        }
    }


    int ans = 1e9;
    // for(int i = 1; i <= m; i++)
    // {
    //     ans = min(ans,f(1,i,c));
    // }
    // cout << ans << endl;

    for (int j = 0; j <=m; j++)
    {
        dp[n+1][j] = 0;
    }

    for (int i = n; i >= 1; i--)
    {
        for (int j = 1; j <= m; j++)
        {
            int k = min(min(dp[i+1][j-1],dp[i+1][j]),dp[i+1][j+1]);
            dp[i][j] = c[i][j] + k;
        }
    }

    for(int i = 1; i <= m; i++)
    {
        ans = min(ans,dp[1][i]);
    }

    cout << ans << endl;
    
    
    


    





}