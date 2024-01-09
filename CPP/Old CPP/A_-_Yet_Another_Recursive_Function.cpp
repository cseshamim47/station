#include <bits/stdc++.h>
using namespace std;

#define int long long

map<int,int> mp;
map<int,bool> vis;
int f(int n)
{
    if(vis[n]) return mp[n];
    if(n == 0) return 1;
    vis[n] = true;
    return mp[n] = f(n/2) + f(n/3);
}

int32_t main()
{
    //    Bismillah
    int n;
    cin >>n;
    cout << f(n) << endl;
}