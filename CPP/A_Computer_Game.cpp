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
    char arr[2][n];

    for(int i = 0; i < 2; i++)
    {
        for(int j = 0; j < n; j++)
        {
            cin >> arr[i][j];
        }
    }

    for(int i = 0; i < n; i++)
    {
        if(i+1 == n) continue;
        if((arr[1][i+1] == '1' && arr[0][i+1] == '1'))
        {
            cout << "NO" << endl;
            return;
        }
        
    }
    cout << "YES" << endl;

}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}