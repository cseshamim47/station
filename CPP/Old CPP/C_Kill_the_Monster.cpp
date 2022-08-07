#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    double h1,p1;
    double h2,p2;
    cin >> h1 >> p1 >> h2 >> p2;
    double k,p,h;
    cin >> k >> p >> h;

    for(int i = 0; i <= k; i++)
    {
        double a = ceil((h1+(h*i))/p2);

        double b = ceil((h2/(p1+(p*(k-i)))));

        if(a >= b) 
        {
            cout << "YES" << endl;
            return;
        }
    }
    cout << "NO" << endl;
}


int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}