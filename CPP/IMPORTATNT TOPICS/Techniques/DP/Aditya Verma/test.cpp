#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

int dp[1000][1000];

int knapsack(int* weights, int* prices, int n, int W)
{
    if(n == 0 || W == 0) return 0;

    if(dp[n][W] != -1) return dp[n][W];

    if(W >= weights[n-1])
    {
        return dp[n][W] = max(prices[n-1] + knapsack(weights,prices,n-1,W-weights[n-1]),
                        knapsack(weights,prices,n-1,W));   
    }else 
        return dp[n][W] = knapsack(weights,prices,n-1,W);
}

void solve()
{
    memset(dp,-1,sizeof(dp));
    int W,n;
    cin >> n;
    int weights[n];
    int prices[n];
    for(int i = 0; i < n; i++) cin >> weights[i];
    for(int i = 0; i < n; i++) cin >> prices[i];
    cin >> W;

    cout << knapsack(weights,prices,n,W) << endl;

    int t[n+1][W+1];
    for(int i = 0; i < n+1; i++)
    {
        for(int j = 0; j < W+1; j++)
        {
            if(i == 0 || j == 0) t[i][j] = 0;
        }
    }

    for(int i = 1; i < n+1; i++)
    {
        for(int j = 1; j < W+1; j++)
        {
            if(j >= weights[i-1])
            {
                t[i][j] = max(prices[i-1]+t[i-1][j-weights[i-1]], t[i-1][j]);
            }
            else 
                t[i][j] = t[i-1][j];
        }
    }

    cout << t[n][W] << endl; 
}

int32_t main()
{
    solve();
}