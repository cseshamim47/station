#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

int sum(int x)
{
    if(x == 0) return 0;
    return (x % 10) + sum(x/10); 
}

void solve()
{
    int x;
    cin >> x;
    cout << sum(x) << endl;
}

int32_t main()
{
      //        Bismillah
    w(t)
    
}