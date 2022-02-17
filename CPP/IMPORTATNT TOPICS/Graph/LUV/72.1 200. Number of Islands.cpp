#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

bool on;

void dfs(int i,int j,vector<vector<char>>& grid)
{
    int r = grid.size();
    int c = grid[0].size();
    if(i >= r || j >= c || i < 0 || j < 0) return;

    if(grid[i][j] == '0') return;
    else if(grid[i][j] == '1')
    {
        grid[i][j] = '0';
    }

    dfs(i+1,j,grid);
    dfs(i,j+1,grid);
    dfs(i,j-1,grid);
    dfs(i-1,j,grid);
}

void solve()
{
    int n,m;
    cin >> n >> m;
    vector<vector<char>> grid;
    for(int i = 0; i < n; i++)
    {
        grid.push_back(vector<char>());
        for(int j = 0; j < m; j++)
        {
            char a;
            cin >> a;
            grid[i].push_back(a);
        }
    }

    int ans = 0;
    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < m; j++)
        {
            if(grid[i][j] == '0') continue;
            ans++;
            dfs(i,j,grid);
        }
    }

    cout << ans << endl;

}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}

