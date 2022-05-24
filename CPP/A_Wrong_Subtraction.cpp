#include <bits/stdc++.h>
using namespace std;

#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

void f()
{}

int Case;
void solve()
{
    int n,k;
    cin >> n >> k;
    while(k--)
    {
        if(n%10 != 0)
        {
            n--;
        }else n/=10;
    }
    cout << n << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
    //f();
}