#include <bits/stdc++.h>
using namespace std;

int n;
vector<int> v;
vector<int> dp;
int f(int idx)
{
    if(idx == n-1) return 0;
    if(dp[idx] != -1) return dp[idx];

    int jump1 = f(idx+1) + abs(v[idx]-v[idx+1]);

    int jump2 = INT_MAX;

    if(idx+2 < n) jump2 = f(idx+2) + abs(v[idx]-v[idx+2]);

    return dp[idx] = min(jump1,jump2);
}

int IterativeWay()
{
    dp.resize(n,-1);
    dp[n-1] = 0;
    for (int idx = n-2; idx >= 0; idx--)
    {
        int jump1 = dp[idx+1]+abs(v[idx]-v[idx+1]);
        int jump2 = INT_MAX;

        if(idx+2 < n) jump2 = dp[idx+2]+abs(v[idx]-v[idx+2]);
        dp[idx] = min(jump1,jump2);
    }
    return dp[0];
    
}

int IterativeWaySpaceOptimized()
{
    dp.resize(n,-1);
    int prev = 0;
    int prev2 = 0;
    for (int idx = n-2; idx >= 0; idx--)
    {
        int jump1 = prev+abs(v[idx]-v[idx+1]);
        int jump2 = INT_MAX;

        if(idx+2 < n) jump2 = prev2+abs(v[idx]-v[idx+2]);
        prev2 = prev;
        prev = min(jump1,jump2);
    }
    return prev;
}

int main()  // TC : O(n)
{
    cin >> n;
    v.resize(n);
    for (int i = 0; i < n; i++)
    {
        cin >> v[i];
    }

    // cout << IterativeWay() << endl;
    dp.resize(n,-1);
    cout << f(0) << endl;
    
}

// 6
// 30 10 60 10 60 50 
// 40