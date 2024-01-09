#include <bits/stdc++.h>
using namespace std;

vector<int> v;
vector<int> dp;


int f(int idx) 
{
    if(idx == 0) return v[idx];
    if(idx < 0) return 0;
    if(dp[idx] != -1) return dp[idx];

    int way1 = f(idx-2)+v[idx];
    int way2 = f(idx-1);

    return dp[idx] = max(way1,way2);
}

int iterative()
{
    dp[0] = v[0];
    int neg = 0;

    for(int i = 1; i < v.size(); i++)
    {

        int way1 = v[i];
        if(i > 1) way1 += dp[i-2];

        int way2 = dp[i-1];
        dp[i] = max(way1,way2);
    }
    return dp[v.size()-1];
}

int iterativeSpaceOptimized()
{
    int prev = v[0];
    int prev2 = 0;

    for(int i = 1; i < v.size(); i++)
    {
        int way1 = v[i];
        if(i > 1) way1 += prev2;

        int way2 = prev;
        int curi = max(way1,way2);
        prev2 = prev;
        prev = curi;
    }
    return prev;
}

int main()
{
    int n;
    cin >> n;
    v.resize(n);
    for (int i = 0; i < n; i++)
    {
        cin >> v[i];
    }
    
    dp.resize(n,-1);
    cout << f(n-1) << endl;
    cout << iterative() << endl;
    cout << iterativeSpaceOptimized() << endl;
}


/* 
5
2 8 10 13 3 
*/