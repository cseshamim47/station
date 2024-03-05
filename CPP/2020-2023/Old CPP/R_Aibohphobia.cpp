#include <bits/stdc++.h>
using namespace std;


string a,b;
int f(int i, int j,vector<vector<int>> &dp)
{
    if(i == 0 || j == 0)
    {
        return a[i] == b[j];
    }

    if(dp[i][j] != -1) return dp[i][j];

    int same = 0;
    int notSame = 0;
    if(a[i] == b[j]) same = 1 + f(i-1,j-1,dp);
    notSame = max(f(i-1,j,dp),f(i,j-1,dp));
    return dp[i][j] = max(same,notSame);
}

int main()
{
    //    Bismillah
    int t;
    cin >> t;
    while(t--)
    {
        cin >> a;
        b = a;
        reverse(b.begin(),b.end()); 
        vector<vector<int>> dp(a.size()+1,vector<int>(a.size()+1,-1));    
        cout << a.size()-f(a.size()-1,a.size()-1,dp) << endl; 
        // int n = a.size();
        // for(int i = 0; i < n; i++)
        // {
        //     for(int j = 0; j < n; j++)
        //     {
        //         if(a[i] == b[j] && (i == 0 || j == 0))
        //         {
        //             dp[i][j] = 1;
        //         }
        //     }
        // }  
        // for(int i = 1; i <= n-1; i++)
        // {
        //     for(int j = 1; j <= n-1; j++)
        //     {
        //         int same = 0;
        //         int notSame = 0;
        //         if(a[i] == b[j]) same = 1 + dp[i-1][j-1];

        //         notSame = max(dp[i-1][j],dp[i][j-1]);

        //         dp[i][j] = max(same,notSame);
        //     }
        // }

        // cout << n-dp[n-1][n-1] << endl;
    }
}