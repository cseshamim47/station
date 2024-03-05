#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 200010

int parent[MAX];
int cnt[MAX];

void init(int n)
{
    for(int i = 1; i<=n; i++)
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

void Union(int u, int v)
{
    int p = Find(u);
    int q = Find(v);
    if(p != q)
    {
        parent[q] = p;
        cnt[p] += cnt[q];
    }
}

int cntSize(int p)
{
    if(p == parent[p]) return cnt[p];
    return cntSize(parent[p]);
}

bool isFriend(int u,int v)
{
    return Find(u) == Find(v);
}

void solve()
{
    int n,m;
    cin >> n >> m;
    init(n);
    while(m--)
    {
        int u,v;
        cin >> u >> v;
        Union(u,v);
    } 
    int ans = 1;
    for(int i = 1; i <= n; i++)
    {
        if(parent[i] == i) 
        {
            ans = (ans * cnt[i]) % 1000000007;
        }
    }
    cout << ans << "\n";
}

// void test();

int32_t main()
{
      //        Bismillah
    // test();
    solve();
}



void test()
{
    init(10);

    Union(1,2);
    Union(2,3);
    Union(1,3);

    Union(4,5);


    map<int,int> m;
    int ans = 1;
    for(int i = 1; i < 6; i++)
    {
        if(parent[i] == i) 
        {
            m[i] = cntSize(i);
            cout << m[i] << endl;
            ans *= m[i];
        }
    }
    cout << ans << endl;
    // cout << cntSize(1) << " " << cnt[2] << endl; 

}