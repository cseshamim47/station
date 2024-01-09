#include <bits/stdc++.h>
using namespace std;

int n,k;
vector<int> v;
vector<int> dp;
int f(int idx)
{
    if(idx == n-1) return 0;
    if(dp[idx] != -1) return dp[idx];


    int jump = INT_MAX;

    for (int i = 1; i <= k && idx+i < n; i++)
    {
        jump = min(jump,f(idx+i) + abs(v[idx]-v[idx+i]));
    }

    return dp[idx] = jump;
}

int IterativeWay()
{
    dp.resize(n+1,-1);
    dp[n-1] = 0;
    for (int idx = n-2; idx >= 0; idx--)
    {
        int jump = INT_MAX;
        for (int i = 1; i <= k && idx+i < n; i++)
        {
            jump = min(jump,dp[idx+i]+abs(v[idx]-v[idx+i]));
        }        
        dp[idx] = jump;
    }
    return dp[0];
    
}

int main() //TC: O(n)*k
{
    cin >> n >> k;
    v.resize(n);
    for (int i = 0; i < n; i++)
    {
        cin >> v[i];
    }

    cout << IterativeWay() << endl;
    // dp.resize(n+1,-1);
    // cout << f(0) << endl;
    
}

// 10 4
// 40 10 20 70 80 10 20 70 80 60       
// 40