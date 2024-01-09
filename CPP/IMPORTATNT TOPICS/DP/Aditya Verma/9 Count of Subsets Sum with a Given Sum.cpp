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
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }
    int sum;
    cin >> sum;

    int up[n+1][sum+1];

    for(int i = 0; i < n+1; i++)
    {
        for(int j = 0; j < sum+1; j++)
        {
            if(i == 0) up[i][j] = 0;
            if(j == 0) up[i][j] = 1;
        }
    }

    for(int i = 1; i < n+1; i++)
    {
        for(int j = 1; j < sum+1; j++)
        {
            if(arr[i-1] <= j)
            {
                up[i][j] = up[i-1][j] + up[i-1][j-arr[i-1]];
            }
            else 
                up[i][j] = up[i-1][j];
        }
    }

    cout << up[n][sum] << endl;
}

int32_t main()
{
    solve();
}



// 3
// 1 3 2
// 3
            // 1 0 0 0 
            // 1 1 0 0
            // 1 1 0 1
            // 1 1 1 2
// op: 2