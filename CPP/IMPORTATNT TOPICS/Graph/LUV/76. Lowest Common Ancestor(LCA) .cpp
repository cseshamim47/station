#include <bits/stdc++.h>
using namespace std;

const int N = 100;
vector<int> adj[N];
int par[N];

void dfs(int vertex, int parent = -1)
{
    par[vertex] = parent;
    for(auto child : adj[vertex])
    {
        if(child == parent) continue;
        dfs(child,vertex);
    }
}

vector<int> path(int v)
{
    vector<int> out;
    while(v != -1)
    {
        out.push_back(v);
        v = par[v];
    }

    reverse(out.begin(),out.end());
    return out;
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

    int x , y;
    cin >> x >> y;

    vector<int> path1 = path(x);
    vector<int> path2 = path(y);

    int sz = min(path1.size(),path2.size());

    int lca = -1;
    for(int i = 0; i < sz; i++)
    {
        if(path1[i] == path2[i])
        {
            lca = path1[i];
        }else break;
    }

    cout << lca << endl;
   

}



/* 

13 12
1 2
1 3 
1 13
2 5
5 6
5 7
5 8
8 12
3 4
4 9
4 10
10 11


*/
