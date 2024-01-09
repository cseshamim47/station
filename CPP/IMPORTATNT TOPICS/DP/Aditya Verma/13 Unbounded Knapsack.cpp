#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

int knapsack(int* wt, int* pr, int n, int w)
{
    int up[n+1][w+1];
    for (int i = 0; i < n+1; i++)
    {
        for (int j = 0; j < w+1; j++)
        {
            if(i==0) up[i][j] = 0;
            if(j==0) up[i][j] = 0;
        }
    }

    for (int i = 1; i < n+1; i++)
    {
        for (int j = 1; j < w+1; j++)
        {
            if(wt[i-1] <= j)
            {
                up[i][j] = max(pr[i-1]+up[i][j-wt[i-1]], up[i-1][j]);
            }
            else 
                up[i][j] = up[i-1][j];
        }
    }
    return up[n][w];
}

void solve()
{
    int n;
    cin >> n;
    int wt[n];
    int pr[n];
    for(int i = 0; i < n; i++)
    {
        cin >> wt[i]; 
    }
    for(int i = 0; i < n; i++)
    {
        cin >> pr[i]; 
    }
    int w;
    cin >> w;
    cout << knapsack(wt,pr,n,w) << endl;
}

int32_t main()
{
    solve();
}


// 2
// 2 1
// 1 1
// 3