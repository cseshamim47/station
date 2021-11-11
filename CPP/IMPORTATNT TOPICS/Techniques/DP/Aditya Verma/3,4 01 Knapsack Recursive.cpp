#include <bits/stdc++.h>
using namespace std;

int dp[100][100];

int knapsack(int* weights, int* prices, int W, int n)
{
    if(n == 0 || W == 0) return 0;

    if(dp[W][n] != -1)
    {
        return dp[W][n];
    }

    if(W >= weights[n-1])
    {
        return dp[W][n] = max(prices[n-1] + knapsack(weights,prices,W - weights[n-1], n-1), knapsack(weights,prices,W,n-1));
    }else
    {
        return dp[W][n] = knapsack(weights,prices,W,n-1);
    }
}

int main()
{
    memset(dp,-1,sizeof(dp));
    int W,n;
    cin >> n;
    int weights[n];
    int prices[n];
    for(int i = 0; i < n; i++) cin >> weights[i];
    for(int i = 0; i < n; i++) cin >> prices[i];
    cin >> W;
        
    cout << knapsack(weights,prices,W,n) << endl;
}

// 10
// 1 2 3 4 5 6 7 8 9 10
// 10 9 8 7 6 5 4 3 2 1
// 6