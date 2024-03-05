#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n, steps;
    cin >> n >> steps;
    int cnt = 0;
    while(n)
    {
        if(n%steps != 0)
        {
            cnt+=(n%steps);
            n-=(n%steps);
        }else
        {
            n/=steps;
            cnt++;
        }   
    }
    cout << cnt << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}