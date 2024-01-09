#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    int arr[n];
    int sum = 0;
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
        sum += arr[i];
    }

    bool up[n+1][sum+1];

    for(int i = 0; i < n+1; i++)
    {
        for(int j = 0; j < sum+1; j++)
        {
            if(i == 0) up[i][j] = false;
            if(j == 0) up[i][j] = true;
        }
    }    

    for(int i = 1; i < n+1; i++)
    {
        for(int j = 1; j < sum+1; j++)
        {
            if(arr[i-1] <= j)
            {
                up[i][j] = up[i-1][j] || up[i-1][j-arr[i-1]];
            }
            else
                up[i][j] = up[i-1][j];
        }
    }

    int range = sum;
    sum/=2;

    vector<int> v;

    for(int i = 0; i <= sum; i++)
    {
        if(up[n][i])
            v.push_back(i);
    }

    int mn = INT_MAX;
    for(int i = 0; i < (int)v.size(); i++)
    {
        mn = min(mn,range - 2*v[i]);
    }

    cout << mn << endl;
}

int32_t main()
{
    solve();
}


// 3
// 1 2 7

// 4