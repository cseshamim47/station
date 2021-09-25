#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 300000
int parent[MAX], R[MAX];

struct MST{
    int u,v,w;
};

void init(int n)
{
    for(int i = 1; i <= n; i++)
    {
        parent[i] = i;
        R[i] = 1;
    }
}

int Find(int p)
{
    if(p == parent[p]) return p;
    return parent[p] = Find(parent[p]);
}

bool Union(int u,int v)
{
    int p = Find(u);
    int q = Find(v);

    if(p != q)
    {
        if(R[p] >= R[q])
        {
            parent[q] = p;
            R[p] += R[q];
        }
        else 
        {
            parent[p] = q;
            R[q] += R[p];
        }
        return true;
    }
    return false;
}

static bool cmp(MST &a, MST &b)
{
    return a.w < b.w;
}

void solve()
{
    int vertex,edge;
    cin >> vertex >> edge;
    int edgeMinus = edge;
    init(vertex);
    vector<MST> store;
    while(edgeMinus--)
    {
        int u,v,w;
        cin >> u >> v >> w;
        MST mst;
        mst.u = u;
        mst.v = v;
        mst.w = w;
        store.push_back(mst);
    }
    sort(store.begin(),store.end(),cmp);
    int ans = 0;
    for(int i = 0; i < edge; i++)
    {
        if(!Union(store[i].u, store[i].v))
        {
            if(store[i].w > 0) ans += store[i].w;
        }
    }
    cout << ans << "\n";
}

int32_t main()
{
      //        Bismillah
    solve(); 
}

// 4 5
// 1 2 1
// 1 3 1
// 1 4 1
// 3 2 2
// 4 2 2