#include <bits/stdc++.h>
using namespace std;

int value[503];
int weight[503];

int dp[503][10003];

int f(int pos, int sum)
{
    if(sum == 0) return 0;
    if(pos == 0) return 1e7;
    if(dp[pos][sum] != -1) return dp[pos][sum];

    int take = 1e7;
    int skip = 1e7;

    if(weight[pos] <= sum)
    {
        take = value[pos] + f(pos,sum-weight[pos]);
    }
    skip = f(pos-1,sum);

    return dp[pos][sum] = min(take,skip);

}

int main()
{
    //    Bismillah
    int t;
    cin >> t;
    while(t--)
    {
        int n;
        int target;
        int pig,pigTot;
        cin >> pig >> pigTot;
        target = pigTot-pig;
        cin >> n;
        for(int i = 1; i <= n; i++) cin >> value[i] >> weight[i];
        for(int i = 0; i <= n; i++)
        {
            for(int j = 0; j <= target; j++)
            {
                if(i==0) dp[i][j] = 1e7;
                if(j == 0) dp[i][j] = 0;                
            }
        }
        
        // int ans = f(n,target);
        int ans = 1e7;
        for(int pos = 1; pos <= n; pos++)
        {
            for(int sum = 0; sum <= target; sum++)
            {
                int take = 1e7;
                int skip = 1e7;

                if(weight[pos] <= sum)
                {
                    take = value[pos] + dp[pos][sum-weight[pos]];
                }
                skip = dp[pos-1][sum];

                dp[pos][sum] = min(take,skip);
            }
        }

        ans = dp[n][target];
        
        if(ans == 1e7)
        {
            cout << "This is impossible." << endl;
        }else 
        {
            cout << "The minimum amount of money in the piggy-bank is " << ans << "." << endl;
        }
    }
}