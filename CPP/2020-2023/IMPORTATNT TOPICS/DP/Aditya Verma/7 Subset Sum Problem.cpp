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
            if(j >= arr[i-1])
            {
                up[i][j] = up[i-1][j-arr[i-1]] || up[i-1][j];
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
// 1 4 2
// 3
// true

// 3
// 1 4 6
// 3