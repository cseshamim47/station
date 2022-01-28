#include <bits/stdc++.h>
using namespace std;

int mem[1000][1000];
int dp[1000][1000];

int LCSubstring(string a, string b, int n, int m,int cnt)
{if(n == 0 || m == 0) return cnt;
    int uniCnt = cnt;
    if(a[n-1] == b[m-1]) 
    {
        uniCnt = LCSubstring(a,b,n-1,m-1,cnt+1);
    }
    
    return max(max(uniCnt,LCSubstring(a,b,n,m-1,0)),LCSubstring(a,b,n-1,m,0)); 
}

// int ans=0;
// if(a[n]==b[m]) ans=max(ans,1+f(n-1,m-1));
// ans=max(ans,f(n-1,m));
// ans=max(ans,f(n,m-1));
// return dp[n][m]=ans

int f(string a, string b, int n, int m)
{
    int ans = 0;
    if(n == 0 || m == 0) return 0;
    // if(dp[n][m] != -1) return dp[n][m];
    if(a[n] == b[m]) ans = max(ans, 1+f(a,b,n-1,m-1));
    ans = max(ans,f(a,b,n-1,m));
    ans = max(ans,f(a,b,n,m-1));
    return dp[n][m] = ans;    
}

int main()
{
    memset(mem,-1,sizeof(mem));
    memset(dp,-1,sizeof(dp));
    string a,b;
    cin >> a >> b;
    
    int n = a.size();
    int m = b.size();
    int cnt = 0;
    cout << "Recusive method dp : " << f(a,b,n,m) << endl;

    cout << "debuggggggg" << endl;
    cout << "Recusive method : " << LCSubstring(a,b,n,m,cnt) << endl;
 

    int up[n+1][m+1];
    for(int i = 0; i < n+1; i++)
    {
        for(int j = 0; j < m+1; j++)
        {
            if(i == 0 || j == 0) up[i][j] = 0;
        }
    }

    int nans = 0;
    for(int i = 1; i < n+1; i++)
    {
        for(int j = 1; j < m+1; j++)
        {
            if(a[i-1] == b[j-1])
            {
                up[i][j] = 1 + up[i-1][j-1];
            }
            else
                up[i][j] = 0;

            nans = max(nans,up[i][j]);
        }
    }

    cout << "Bottom UP DP : " << nans << endl;

}

// GeeksforGeeks
// GeeksQuiz

// 5

// axb
// abx

// 1

// abc
// bcc

// 2