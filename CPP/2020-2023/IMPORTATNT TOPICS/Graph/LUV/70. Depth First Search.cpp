#include <bits/stdc++.h>
using namespace std;

const int N = 1e5+10;
vector<int> graph[N];

bool vis[N];

void dfs(int vertex)
{
    // cout << vertex << endl;
    // if(vistied[child]) return;
    vis[vertex] = true;
    // Take action on vertex after entering the vertex
    for(int child : graph[vertex])
    {
        // cout << "Parent : " << vertex << ", child : " << child << endl;
        // Take action on child before entering the child node   
        if(vis[child]) continue;
        dfs(child);
        // Take action on child after exiting the child node   
    }
    // Take action on vertex before exiting the vertex    
}

int main()
{
    int v,e;
    cin >> v >> e;

    for(int i = 0; i < e; i++)
    {
        int a,b;
        cin >> a >> b;
        graph[a].push_back(b);
        graph[b].push_back(a);
    }

    dfs(1);
}


/*
6 7
1 3 
1 5
5 4
4 3
4 6
6 2
2 3
 */