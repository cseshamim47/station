#include <bits/stdc++.h>
using namespace std;

int f(int i, int j, vector<int>&girl, vector<int> &boy,vector<vector<int>> &dp)
{
    if(i == 0)
    {
        while(j >= 0)
        {
            if(girl[0] == boy[j]) return 1;
            j--;
        }
        return 0;
    }

    if(j == 0)
    {
        while(i >= 0)
        {
            if(girl[i] == boy[0]) return 1;
            i--;
        }
        return 0;
    }

    if(dp[i][j] != -1) return dp[i][j];
    int eksatheJa = 0;
    if(girl[i] == boy[j]) 
    {
        eksatheJa = 1 + f(i-1,j-1,girl,boy,dp);
    }
    int bestWay = max(f(i,j-1,girl,boy,dp), f(i-1,j,girl,boy,dp));

    return dp[i][j] = max(eksatheJa,bestWay);
}

int main()
{
    //    Bismillah
    int t;
    cin >> t;
    while(t--)
    {
        int val;
        vector<int> girl;
        while(cin >> val)
        {
            if(val != 0) girl.push_back(val);
            else break;
        }
        int ans = 0;
        while(true)
        {
            vector<int> boy;
            while(cin >> val)
            {
                if(val != 0) boy.push_back(val);
                else break;
            }
            if(boy.size() == 0) break;
            
            vector<vector<int>> dp(girl.size()+1, vector<int>(boy.size()+1,0));
            ans = max(ans,f(girl.size()-1, boy.size()-1, girl,boy,dp));

            for(int i = 0; i <= girl.size(); i++)
            {
                if(girl[i] == boy[0])
                {
                    dp[i][0] = 1;
                }else if(i) dp[i][0] = dp[i-1][0];
            }
            for(int i = 0; i <= boy.size(); i++)
            {
                if(girl[0] == boy[i])
                {
                    dp[0][i] = 1;
                }else if(i) dp[0][i] = dp[0][i-1];
            }

            for(int i = 1; i < girl.size(); i++)
            {
                for(int j = 1; j < boy.size(); j++)
                {
                    int eksatheJa = 0;
                    if(girl[i] == boy[j]) 
                    {
                        eksatheJa = 1 + dp[i-1][j-1];
                    }
                    int bestWay = max(dp[i][j-1], dp[i-1][j]);

                    dp[i][j] = max(eksatheJa,bestWay);
                }
            }
            ans = max(ans,dp[girl.size()-1][boy.size()-1]);
            
        }
        cout << ans << endl;
    }
}