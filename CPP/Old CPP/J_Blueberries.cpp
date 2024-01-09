#include <bits/stdc++.h>
using namespace std;


int f(int n, int wt, vector<int>&v, vector<vector<int>> &dp)
{
    if(n <= 0) return 0;
    if(dp[n][wt] != -1) return dp[n][wt];

    int pick = 0;
    int notpick = 0;
    if(v[n] <= wt)
    {
        pick = f(n-2,wt-v[n],v,dp) + v[n];
    }

    notpick = f(n-1,wt,v,dp);

    return dp[n][wt] = max(pick,notpick);
}

int Case;
int main()
{
    //    Bismillah
    int t;
    cin >> t;
    while(t--)
    {
        int n,wt;
        cin >> n >> wt;
        vector<int> v(n+1);
        vector<vector<int>> dp(n+1,vector<int>(wt+1,0));
        for(int i = 1; i <= n; i++)
        {
            cin >> v[i];
        }

        for(int i = 1; i <= n; i++)
        {
            for(int j = 1; j <= wt; j++)
            {
                int pick = 0;
                int notpick = 0;
                if(v[i] <= j)
                {
                    if(i >= 2)
                    pick = dp[i-2][j-v[i]] + v[i];
                    else pick = v[i];
                }

                notpick = dp[i-1][j];

                dp[i][j] = max(pick,notpick);
            }
        }

        cout << "Scenario #" << ++Case<<": " << dp[n][wt] << endl;
    }
}