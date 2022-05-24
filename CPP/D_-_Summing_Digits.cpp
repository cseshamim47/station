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

void bruteforce()
{}

int Case;
void solve()
{
    int x;
    while(cin >> x)
    {
        if(x == 0) return;
        int n = 0;
        while(true)
        {
            n += x%10;
            x/=10;   
            if(x == 0)
            {
                x = n;
                if(n < 10)
                {
                    cout << n << endl;
                    break;
                }
                n = 0;
            }
        }
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
    //bruteforce();
}