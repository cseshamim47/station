#include <bits/stdc++.h>
using namespace std;

void solve(int w, int n)
{
    //    Bismillah
    int value[n+1];
    int weight[n+1];
    for(int i = 1; i <= n; i++) cin >> weight[i] >> value[i];
    int dp[n+2][w+2];
    int dp2[n+2][w+2];
    memset(dp, 0, sizeof dp);
    memset(dp2, 0, sizeof dp2);
    for(int i = 1; i <= n; i++)
    {
        for(int curWeight = 1; curWeight <= w; curWeight++)
        {
            int ans = 0;
            int weightAns = 0;
            if(curWeight >= weight[i])
            {
                ans = dp[i-1][curWeight-weight[i]] + value[i];
                weightAns = dp2[i-1][curWeight-weight[i]] + weight[i];
            }
    
            if(dp[i-1][curWeight] == ans)
            {
                dp[i][curWeight] = ans;
                dp2[i][curWeight] = min(dp2[i-1][curWeight],weightAns);

            }
            
            else if(dp[i-1][curWeight] < ans)
            {
                dp[i][curWeight] = ans;
                dp2[i][curWeight] = weightAns;
            }else 
            {
                dp[i][curWeight] = dp[i-1][curWeight];
                dp2[i][curWeight] = dp2[i-1][curWeight];
            }
            
        }
    }

    cout << dp2[n][w] << " " << dp[n][w] << endl;

    
}

int main()
{
        int w,n;
    while(cin >> w >> n)
    {
        if(w == 0 && n == 0) break;

        solve(w,n);
    }
}