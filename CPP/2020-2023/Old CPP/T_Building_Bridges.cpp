#include <bits/stdc++.h>
using namespace std;

int f(int n,int prev, vector<pair<int,int>> &v,vector<vector<int>> &dp)
{
    if(n == 0) return 0;
    if(dp[n][prev] != -1)  return dp[n][prev];

    int upor = v[n].first;
    int nich = v[n].second;
    int take = 0;
    int skip = 0;
    if(prev == 0 || nich <= v[prev].second)
    {
        take = 1 + f(n-1,n,v,dp);
    }
    skip = f(n-1,prev,v,dp);

    return dp[n][prev] = max(take,skip);
}

int main()
{
    //    Bismillah
    int t;
    cin >> t;
    while(t--)
    {
        int n;
        cin >> n;
        vector<pair<int,int>> v(n+1);
        for(int i = 1; i <= n; i++) cin >> v[i].first;
        for(int i = 1; i <= n; i++) cin >> v[i].second;

        sort(v.begin(),v.end());

        vector<vector<int>> dp(n+1,vector<int>(n+1,0));


        for(int i = 1; i <= n; i++)
        {
            for(int prev = n; prev >= 0; prev--)
            {
                int upor = v[i].first;
                int nich = v[i].second;
                int take = 0;
                int skip = 0;
                if(prev == 0 || nich <= v[prev].second)
                {
                    take = 1 + dp[i-1][i];
                }
                skip = dp[i-1][prev];

                dp[i][prev] = max(take,skip);
            }
        }

        // cout << f(n,0,v,dp) << endl;
        cout << dp[n][0] << endl;
        

    }
}