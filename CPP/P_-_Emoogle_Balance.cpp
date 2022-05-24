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
    int n;
    while(cin >> n)
    {
        if(n==0) return;
        int zero = 0;
        for(int i = 0; i < n; i++) 
        {
            int x;
            cin >> x;
            if(x == 0) zero++;
        }
        printf("Case %d: %d\n",++Case,n-zero*2);
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
    //f();
}