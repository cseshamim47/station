#include <bits/stdc++.h>
using namespace std;



int f(int mask, vector<int> &dp)
{
    if(dp[mask] != -1) return dp[mask];
    int cnt = 0;
    for(int i = 0; i < 12; i++) if(mask & (1 << i)) cnt++;

    dp[mask] = cnt;

    for(int i = 0; i < 10; i++)
    {
        if(mask&(1<<i) && mask&(1<<(i+1)) && !(mask&(1<<(i+2))))
        {
            int newMask = mask^(1<<i)^(1<<i+1)^(1 << i+2);
            dp[mask] = min(dp[mask],f(newMask,dp));
        }else if(!(mask&(1<<i)) && mask&(1<<(i+1)) && (mask&(1<<(i+2))))
        {
            int newMask = mask^(1<<i)^(1<<i+1)^(1 << i+2);
            dp[mask] = min(dp[mask],f(newMask,dp));
        }
    }

    return dp[mask];

    

}

void solve()
{
    string str;
    cin >> str;
    int cnt = 0;
    int mask = 0;
    
    for(int i = 0; i < 12; i++)
    {
        if(str[i] == 'o') mask |= (1 << i);
    }
    vector<int> dp((1<<13),-1);
    cout << f(mask, dp) << endl;



}

int main()
{
    int t=1;
    cin >> t;
    while(t--)
    {
        solve();   
    }    
}