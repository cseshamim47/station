#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n,r;
    cin >> n >> r;
    if((n+1)/2 < r) cout << -1 << endl;
    else 
    {
        int arr[n+1][n+1];
        int cnt = 0;
        int a=0,b=0;
        for(int i = 0; i < n; i++)
        {
            for(int j = 0; j < n; j++)
            {
                 if(i==a && j==b && cnt<r)
                 {
                     cout << 'R';
                     a+=2;
                     b+=2;
                     cnt++;
                     continue;
                 }
                //  arr[i][j] = '.';
                cout << '.';
            }
            cout << endl;
        }
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}