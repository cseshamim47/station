#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

bool f(int n)
{
    int tmp = n;
    int d = n%10;
    while(n)
    {
        if(d) 
        {
            if(tmp % d != 0) return false;
        }
        n/=10;
        d = n%10;
    }
    return true;
}

void solve()
{
    int n;
    cin >> n;
    while(!f(n)) n++;
    cout << n << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}