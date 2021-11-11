#include <bits/stdc++.h>
using namespace std;



int main()
{
    int W,n;
    cin >> n;
    int weights[n];
    int prices[n];
    for(int i = 0; i < n; i++) cin >> weights[i];
    for(int i = 0; i < n; i++) cin >> prices[i];
    cin >> W;

    int dp[n+1][W+1]; 
    for(int i = 0; i <= n; i++)
    {
        for(int j = 0; j <= W; j++)
        {
            if(i == 0 || j == 0) dp[i][j] = 0;
        }
    }   

    for(int i = 1; i < n+1; i++)
    {
        for(int j = 1; j < W+1; j++)
        {
            if(j >= weights[i-1])
            {
                dp[i][j] = max(prices[i-1]+dp[i-1][j-weights[i-1]],
                                dp[i-1][j]);   

                // cout << dp[i][j] << endl;
                // cout << i << " " << j << endl;
                // cout << dp[i-1][j-weights[i-1]] << " " << j-weights[i-1] << endl;
                // getchar();          
            }
            else 
            {
                dp[i][j] = dp[i-1][j];
            }
        }
    } 

    // for(int i = 0; i < n+1; i++)
    // {
    //     for(int j = 0; j < W+1; j++)
    //     {
    //         cout << dp[i][j] << " ";
    //     }
    //     cout << endl;
    // }
    cout << dp[n][W] << endl;

}

// 10
// 1 2 3 4 5 6 7 8 9 10
// 10 9 8 7 6 5 4 3 2 1
// 6

// correct ans : 27

// 3
// 10 20 30
// 60 100 120
// 50

// 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0
// 0 0 0 0 0 0 0 0 0 0 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60 60
// 0 0 0 0 0 0 0 0 0 0 60 60 60 60 60 60 60 60 60 60 100 100 100 100 100 100 100 100 100 100 160 160 160 160 160 160 160 160 160 160 160 160 160 160 160 160 160 160 160 160 160
// 0 0 0 0 0 0 0 0 0 0 60 60 60 60 60 60 60 60 60 60 100 100 100 100 100 100 100 100 100 100 160 160 160 160 160 160 160 160 160 160 180 180 180 180 180 180 180 180 180 180 220

// 220