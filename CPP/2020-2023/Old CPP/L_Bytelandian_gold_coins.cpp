#include <bits/stdc++.h>
using namespace std;
#define int long long

map<int,int> mp;
int f(int n)
{
    int a = n/2;
    int b = n/3;
    int c = n/4;
    if(a+b+c < n) return n;
    if(mp.count(n)) return mp[n];

    return mp[n] = f(a) + f(b) + f(c);
}

int32_t main()
{
    //    Bismillah
    int n;
    while(cin >> n)
    {
        cout << f(n) << endl;
    }
}