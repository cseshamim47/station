#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n,m,r,c;
    cin >> n >> m >> r >> c;
    r--;
    c--;
    char ch[n][m];
    bool ase = false;
    int cnt = 0;
    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < m; j++)
        {
           cin >> ch[i][j];
           if(ch[i][j] == 'B') ase = true;
        }
    }

    for(int i = 0; i < m; i++)
    {
        if(ch[r][i] == 'B') cnt = 1;
    }
    for(int i = 0; i < n; i++)
    {
        if(ch[i][c] == 'B') cnt = 1;
    }

    if(!ase) cout << -1 << endl;
    else if(ch[r][c] == 'B') cout << 0 << endl; 
    else if(cnt) cout << 1 << endl;
    else cout << 2 << endl;

}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}