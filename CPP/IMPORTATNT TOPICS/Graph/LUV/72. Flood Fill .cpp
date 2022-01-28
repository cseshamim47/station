#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

const int N = 1e5+10;

bool vis[N];
vector<int> adj[N];

void dfs(vector<vector<int>>& image,int i, int j, int newColor,int prevColor)
{   
    int n = image.size();
    int m = image[0].size();
    if(i<0 || j<0) return;
    if(i>=n || j >= m) return;
    if(image[i][j] != prevColor) return;

    image[i][j] = newColor;
    
    dfs(image,i,j+1,newColor,prevColor);
    dfs(image,i,j-1,newColor,prevColor);
    dfs(image,i+1,j,newColor,prevColor);
    dfs(image,i-1,j,newColor,prevColor);
}

vector<vector<int>> floodFill(vector<vector<int>>& image, int sr, int sc, int newColor) 
{
    int prevColor = image[sr][sc];
    if(prevColor != newColor)
    {
        dfs(image,sr,sc,newColor,prevColor); 
    }
    return image;
}

void solve()
{
    
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}