#include <bits/stdc++.h>
using namespace std;

const int N = 100;
vector<int> adj[N];

int height[N];
int depth[N];

bool vis[N];

void dfs(int parent)
{
    vis[parent] = true;
    for(auto child : adj[parent])
    {
        if(vis[child]) continue;
        depth[child] = 1 + depth[parent];
        dfs(child);
        height[parent] = max(1 + height[child],height[parent]);
    }
}


int main()
{
    int v,e;
    cin >> v >> e;

    for(int i = 0; i < e; i++)
    {
        int a,b;
        cin >> a >> b;
        adj[a].push_back(b);
        adj[b].push_back(a);
    }     

    dfs(1);
    int mxNode = 0;
    int dpth = 0;
    for(int i = 1; i <= 13; i++)
    {
        // cout << i << " : height (" << height[i] << ") & depth(" << depth[i] << ")" << endl; 
        if(depth[i] > dpth)
        {
            dpth = depth[i];
            mxNode = i;
        }
        depth[i] = 0;
        vis[i] = false;
    }

    dfs(mxNode);

    int diameter = 0;
    for(int i = 1; i <= 13; i++)
    {
        diameter = max(diameter,depth[i]);
    }

    cout << diameter << endl;


}



// 13 12
// 1 2
// 1 3 
// 1 13
// 2 5
// 5 6
// 5 7
// 5 8
// 8 12
// 3 4
// 4 9
// 4 10
// 10 11
