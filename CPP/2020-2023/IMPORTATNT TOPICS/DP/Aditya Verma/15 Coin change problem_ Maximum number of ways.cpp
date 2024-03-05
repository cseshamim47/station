#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

int coinChange(int S[],int m, int n)
{
    int t[m+1][n+1];
    for (int i = 0; i < m+1; i++)
    {
        for (int j = 0; j < n+1; j++)
        {
            if(i == 0) t[i][j] = 0;
            if(j == 0) t[i][j] = 1;
        }
    }

    for (int i = 1; i < m+1; i++)
    {
        for (int j = 1; j < n+1; j++)
        {
            if(j>=S[i-1])
            {
                t[i][j] = t[i-1][j] + t[i][j-S[i-1]];
            } 
            else 
                t[i][j] = t[i-1][j];
        }
    }

    return t[m][n];   
    
}

// https://practice.geeksforgeeks.org/problems/coin-change2448/1

void solve()
{
    int n,m;
    cin >> n >> m;
    int S[m];
    for(int i = 0; i < m; i++)
    {
        cin >> S[i]; 
    }

    cout << coinChange(S,m,n) << endl;
}

int32_t main()
{
    solve();
}