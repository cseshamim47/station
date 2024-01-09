#include <bits/stdc++.h>
using namespace std;

#define int long long
#define vi vector<int>
#define vii vector<pair<int,int>>
#define pii pair<int,int>
#define pb push_back
#define pf push_front
#define F first
#define S second
#define INF 1e18

const int N = 1e5+100;
vii adj[N];
int wt[N];

void dijkstra(int source, int nodes) // TC : O(E + Vlog2(V))
{
    for(int i = 0; i < nodes; i++) wt[i] = 1e18;
    wt[source] = 0;
    priority_queue<pii, vii, greater<pii>> pq;
    pq.push({0,source});

    while(!pq.empty())
    {
        int curV = pq.top().S;
        int curVW = pq.top().F;
        pq.pop();

        if(curVW > wt[curV]) continue;

        for(auto child : adj[curV])
        {
            int childV = child.F;
            int childVW = child.S;
            if(curVW + childVW < wt[childV])
            {
                wt[childV] = curVW + childVW;
                pq.push({wt[childV],childV});
            }
        }
    }
}


int32_t main()
{
    int n, e;
    cin >> n >> e;
    for(int i = 0; i < e; i++)
    {
        int u, v, w;
        cin >> u >> v >> w;
        adj[u].pb({v,w});
        adj[v].pb({u,w});
    }
    dijkstra(0,n);

    for(int i = 0; i < n; i++)
        cout << i << " : " << wt[i] << endl;
}


// 9 14
// 0 1 4
// 0 7 8
// 1 7 11
// 1 2 8
// 7 8 7
// 7 6 1
// 6 8 6 
// 6 5 2
// 8 2 2
// 2 3 7
// 2 5 4
// 3 5 14
// 3 4 9
// 5 4 10
