#include <bits/stdc++.h>
using namespace std;

int knapsack(int* weights, int* prices, int W, int n)
{
    if(n == 0 || W == 0) return 0;

    if(W >= weights[n-1])
    {
        return max(prices[n-1] + knapsack(weights,prices,W - weights[n-1], n-1), knapsack(weights,prices,W,n-1));
    }else
    {
        return knapsack(weights,prices,W,n-1);
    }
}

int main()
{
    int W,n;
    cin >> n;
    int weights[n];
    int prices[n];
    for(int i = 0; i < n; i++) cin >> weights[i];
    for(int i = 0; i < n; i++) cin >> prices[i];
    cin >> W;
        
    cout << knapsack(weights,prices,W,n) << endl;
}