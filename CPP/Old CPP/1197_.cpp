#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 35000
int parent[MAX];
int cnt[MAX];

void init(int n)
{
    for(int i = 0; i < n; i++)
    {
        parent[i] = i;
        cnt[i] = 1;
    }
}

int Find(int p)
{
    if(p == parent[p]) return p;
    return parent[p] = Find(parent[p]);
}

void Union(int u,int v)
{
    int p = Find(u);
    int q = Find(v);
    if(p != q)
    {
        parent[q] = p;    
        cnt[p] += cnt[q];
    }
}

int findSize(int u)
{
    if(u == parent[u]) return cnt[u];
    return findSize(parent[u]);
}

void solve(int s,int t)
{
    init(s);
    while(t--)
    {
        int grpSize;
        cin >> grpSize;
        int firstMember;
        cin >> firstMember;
        grpSize--;
        while(grpSize--)
        {
            int u;
            cin >> u;
            Union(firstMember,u);
        }
    }
    cout << findSize(0) << "\n";
}

int32_t main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    while(true)
    {
        int s,t;
        cin >> s >> t;
        if(s == 0 && t == 0) break;
        solve(s,t);    
    }
}


// makeset
// init 
// find
// union
// isFriend

// init(10);
// Union(1,2);
// Union(2,3);
// cout << findSize(2) << " " << cnt[2] << endl; 
// return 0;