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
    char arr[n][n];

    for (int i = 0; i < n; i++)
    {
        for(int j = 0; j < n; j++)
        {
            cin >> arr[i][j];
        }
    }
    
    for (int i = 0; i < n; i++)
    {
        for(int j = 0; j < n; j++)
        {
            if(arr[i][j] == '.')
            {
                if(i + 2 < n  && j + 1 < n && j - 1 >= 0 && arr[i+1][j] == '.' && arr[i+1][j-1] == '.' && arr[i+1][j+1] == '.' && arr[i+2][j] == '.')
                {
                    arr[i][j] = '#';
                    arr[i+1][j] = '#';
                    arr[i+1][j-1] = '#';
                    arr[i+1][j+1] = '#';
                    arr[i+2][j] = '#';
                    continue;
                }
                else
                {
                    cout << "NO" << endl;
                    return;
                }
            }
        }
    }
    cout << "YES" << endl;

    
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}