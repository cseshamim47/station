#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n,m;
    cin >> n >> m;
    char arr[n+10][m+10]; 

    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < m; j++)
        {
            cin >> arr[i][j];
        }
    }

    char a[n][m];
    char b[n][m];
    int cnt = 0;

    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < m; j++)
        {
            if(cnt%2 == 0)
            {
               a[i][j] = 'W';
               b[i][j] = 'R';
            }
            else 
            {
                a[i][j] = 'R';
                b[i][j] = 'W';
            }
            if(j + 1 == m && j != 0) cnt--;
            cnt++;
            if(m & 1 && j+1 == m && j != 0) cnt--;
        }
    }

    bool A = true;
    bool B = true;

    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < m; j++)
        {
            if(arr[i][j] == '.') continue;
            else
            {
                if(arr[i][j] != a[i][j]) A = false; 
                if(arr[i][j] != b[i][j]) B = false; 
            }
        }
    }

    if(A)
    {
        cout << "YES" << endl;
        for(auto &i : a)
        {
            for(auto j : i) cout << j;
            printf("\n");
        }
    }
    else if(B)
    {
        cout << "YES" << endl;
        for(auto &i : b)
        {
            for(auto j : i) cout << j;
            printf("\n");
        }
    }
    else cout << "NO" << endl;

}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    // solve();
}