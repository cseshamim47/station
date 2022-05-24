#include <bits/stdc++.h>
using namespace std;

#define sq(x)   (x)*(x)
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

void bruteforce()
{}

void solve()
{
    int n, k;
    cin >> n >> k;
    if(n <= 4 && k+1 == n)
    {
        cout << -1 << endl;
    }else if(k==0)
    {
        n--;
        for(int i = 0; i <= n; n--,i++)
        {
            cout << i << " " << n << endl;
        }
    }else
    {
        n--;
        cout << n << " " << k << endl;
        n--;
        for(int i = 1; i <= n; i++,n--)
        {
            if(i == k)
            {
                cout << 0 << " " << n << endl;
                // i--;
            }else if(n == k)
            {
                cout << 0 << " " << i << endl;
                // n++;
            }else
            {
                cout << i << " " << n << endl;
            }
        }
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
    //bruteforce();
}