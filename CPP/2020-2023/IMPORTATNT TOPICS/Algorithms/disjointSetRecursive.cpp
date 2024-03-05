#include <bits/stdc++.h>
using namespace std;

#define MX 100

int parent[MX],R[MX];

void makeSet(int u)
{
    // initialization 
    parent[u] = u;
    R[u] = 1;
}

void init()
{
    for(int i = 1; i <= 8; i++)
    {
        makeSet(i);
    }
}

bool flag = false;
int Find(int u)
{
    if(flag)
    cout << "Called : " << u << endl;
    if(u == parent[u]) return u;
    // return Find(parent[u]);
    return parent[u] = Find(parent[u]); // path compression
    
}

void Union(int u, int v)
{
    int p = Find(u);
    int q = Find(v);
    if(p != q)
    {
        if(R[p] >= R[q])
        {
            parent[q] = p;
            R[p] += R[q];
        }else
        {
            parent[p] = q;
            R[q] += R[p];
        }
    } 
}

int findRank(int u)
{
    if(u == parent[u]) return R[u];
    return findRank(parent[u]);
}

bool isFriend(int u, int v)
{
    int p = Find(u);
    int q = Find(v);
    return p == q;
}

int main()
{
    init();
    // for(int i = 1; i <= 8; i++)
    // {
    //     cout << "Parent of " << i << " is " << parent[i] << endl; 
    // }

    // Union(1,2);
    // Union(2,3);
    // Union(3,4);
    // Union(4,5);
    // Union(5,6);
    // Union(6,7);
    // Union(7,8);

    // Union(7,8);
    // Union(6,7);
    // Union(5,6);
    // Union(4,5);
    // Union(3,4);
    // Union(2,3);
    // Union(1,2);
    
    // // cout << Find(1) << " " << Find(3) << endl;

    // // if(isFriend(2,8)) cout << "Friends" << endl;
    // // else cout << "Not Friends" << endl;

    // flag = true; 
    // Find(8);
    // cout << "---" << endl;
    // Find(6);
    // cout << "---" << endl;
    // Find(7);
    // cout << "---" << endl;


    // Union(1,2);
    // Union(2,3);

    // Union(4,5);
    // Union(5,6);
    // Union(6,7);
    // Union(3,6);

    // cout << "Rank of " << 6 << " is " << findRank(6) << endl;
    // cout << R[4] << endl;
    // cout << R[1] << endl;

    cout << Find(1) << endl; // check who is parent

}