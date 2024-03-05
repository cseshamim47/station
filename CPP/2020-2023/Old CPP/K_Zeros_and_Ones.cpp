#include <bits/stdc++.h>
using namespace std;

#define int long long

int pw[100];
int n,k;
int dp[70][70][102];
int f(int pos, int oneTaken, int kmod)
{
    if(pos == n-1)
    {
        return ((kmod+pw[pos])%k == 0  && (oneTaken)*2 == n);
    }

    if(dp[pos][oneTaken][kmod] != -1) return dp[pos][oneTaken][kmod]; 

    
    int takeOne = f(pos+1,oneTaken+1, (kmod+pw[pos])%k);
    int takeZero = f(pos+1,oneTaken,kmod);


    return dp[pos][oneTaken][kmod] = takeOne+takeZero;
}

int Case;
int32_t main()
{
    pw[0] = 1;
    for(int i = 1; i <= 64; i++)
    {
        pw[i] = pw[i-1]*2;
    }
    int t;
    cin >> t;
    while(t--)
    {
        
        printf("Case %lld: ",++Case);
        cin >> n >> k; 
        if(k == 0 || n%2 == 1) 
        {
            cout << 0 << endl;
            continue;
        }
        memset(dp,0,sizeof dp);
        
        // if(pw[n-1]%k == 0)

        for(int kmod = n-1; kmod>=0; kmod--)
        {
            if((kmod+pw[n-1])%k == 0) dp[n-1][n/2][(kmod)] = 1;
        }

        for(int pos = n-2; pos >= 0; pos--)
        {
            for (int oneTaken = n/2; oneTaken >= 1; oneTaken--)
            {
                for(int kmod = k-1; kmod >= 0; kmod--)
                {
                    int takeOne = dp[pos+1][oneTaken+1][(kmod+pw[pos])%k];
                    int takeZero = dp[pos+1][oneTaken][kmod];
                    dp[pos][oneTaken][kmod] = takeOne+takeZero;
                }
            }
        }
        // cout << f(0,1,0) << endl;   
        cout << dp[0][1][0] << endl;   
    }

}