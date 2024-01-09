#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

int minCoinChange(int* coins,int n, int sum)
{
    int t[n+1][sum+1];
    for (int i = 0; i < n+1; i++)
    {
        for (int j = 0; j < sum+1; j++)
        {
            if(j == 0) t[i][j] = 0;
            if(i == 0) t[i][j] = INT_MAX-1;
        }
    }
    
    for (int i = 1; i < n+1; i++)
    {
        for (int j = 1; j < sum+1; j++)
        {
            if(j >= coins[i-1])
            {
                t[i][j] = min(t[i-1][j], 1+t[i][j - coins[i-1]]);
            }
            else 
                t[i][j] = t[i-1][j];
        }
    }

    return t[n][sum]>sum ? -1 : t[n][sum];

}

void solve()
{
    int n;
    int sum;
    cin >> n >> sum;
    int coins[n];
    for (int i = 0; i < n; i++)
    {
        cin >> coins[i];
    }

    cout << minCoinChange(coins,n,sum) << endl;
}

int32_t main()
{
    solve();
}