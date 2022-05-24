#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    char ch[4][4];
    for(int i = 0; i < 4; i++)
    {
        for(int j = 0; j < 4; j++)
        {
            cin >> ch[i][j];
        }
    }

    for(int i = 3; i > 0; i--)
    {
        for(int j = 3; j > 0; j--)
        {
            int dot = 0;
            int hash = 0;
            if(ch[i][j] == '#') hash++;
            else dot++;
            if(ch[i][j-1] == '#') hash++;
            else dot++;
            if(ch[i-1][j-1] == '#') hash++;
            else dot++;
            if(ch[i-1][j] == '#') hash++;
            else dot++;

            if(dot >= 3 || hash >= 3)
            {
                cout << "YES" << endl;
                return;
            }
        }
    }
    cout << "NO" << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}