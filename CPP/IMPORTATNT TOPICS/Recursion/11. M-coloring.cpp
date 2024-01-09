#include <bits/stdc++.h>
using namespace std;

#define fo(i,n) for(int i=0;i<n;i++)
#define Fo(i,k,n) for(i=k;k<n?i<n:i>n;k<n?i+=1:i-=1)

const int N = 1e3;
int n,e,colors;
int nodeColor[N];
vector<int> adj[N];
bool isSafe(int node,int col) // O(n)
{
    for(auto child : adj[node])
    {
        if(nodeColor[child] == col) return false;
    }
    return true;
}

bool f(int node) // (col^node === O(M^N*N))
{
    if(node == n) return true;

    for(int col = 1; col <= colors; col++)
    {
        if(isSafe(node,col))
        {
            nodeColor[node] = col;
            if(f(node+1)) return true;
            nodeColor[node] = 0;
        }
    }
    return false;
}
int main()
{
    cin >> n >> e;
    fo(i,e)
    {
        int u,v;
        cin >> u >> v;
        adj[u].push_back(v);
        adj[v].push_back(u);
    }
    cin >> colors;

    if(f(0)) cout << "Possible to color" << endl;
    else cout << "Colors not enough" << endl;

}



/* 

4 5
0 1 
1 2
0 2
3 2
0 3
3


0---------1
|\        | 
| \       |
|  \      |
|   \     |
|    \    |
|     \   | 
|      \  |
|       \ |
|        \|
3---------2

Color this graph using 3 color 
ans : possible

using 2 color 
ans : not possible
*/