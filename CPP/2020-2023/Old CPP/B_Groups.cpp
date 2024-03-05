#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

// not myself
void solve()
{
    int n;
    cin >> n;
    int arr[n][5]{0};
    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < 5; j++) cin >> arr[i][j];
    }

    bool matched = false;
    for(int i = 0; i < 4; i++)
    {
        for(int j = i+1; j < 5; j++)
        {
            int both = 0,first = 0, second = 0;
            for(int k = 0; k < n; k++)
            {
                if(arr[k][i] == 1 && arr[k][j] == 1) both++;
                else if(arr[k][i] == 1) first++;
                else if(arr[k][j] == 1) second++;
            }
            int g1 = n/2 - first, g2 = n/2 - second;
            // cout << i << " " << j << endl;
            // cout << both << " " << first << " " << second << endl;
            // cout << g1 << " " << g2 << " " << g1+g2 << endl;
            if(g1 >= 0 && g2 >= 0 && both == g1+g2)
            {
                matched = true;
                break;
            }
        }
        if(matched) break;
    }
    if(matched)
            cout << "YES" << endl;
    else cout << "NO" << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}