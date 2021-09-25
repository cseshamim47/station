#include <bits/stdc++.h>
using namespace std;

#define MX 100005
int parent[MX], R[MX];

struct kruskalStruct{
    int u,v,w;
};
static bool cmp(kruskalStruct &a, kruskalStruct &b)
{
    return a.w < b.w;
}

void init(int v)
{
    for(int i = 0; i <= v; i++)
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


vector<kruskalStruct> store;

void kruskalsMST()
{
    int vertex,edge;
    cin >> vertex >> edge;

    init(vertex);

    for(int i = 0; i < edge; i++)
    {
        int u,v,w;
        cin >> u >> v >> w;
        kruskalStruct ks;
        ks.u = u; 
        ks.v = v;
        ks.w = w;
        store.push_back(ks);
    }

    sort(store.begin(),store.end(),cmp);
    
    int totalWeight = 0;
    for(int i = 0; i < store.size(); i++)
    {
        if(Union(store[i].u,store[i].v)) totalWeight += store[i].w;
    }

    cout << "Kruskal's MST : " << totalWeight << endl;
}

int main()
{
    kruskalsMST(); 
}


// 9 14
// 0 1 4
// 0 7 8
// 1 2 8
// 1 7 11
// 7 8 7
// 7 6 1
// 2 3 7
// 2 8 2
// 2 5 4
// 6 8 6
// 6 5 2
// 3 4 9
// 3 5 14
// 4 5 10
