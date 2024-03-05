#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006


void solve()
{
    vector<int> p{3,5,7,11,13,17,19,23,29,31,37};
    int n;
    cin >> n;
    if(n & 1)
    {
        n--;
        int b = 0;
        for(int i = 0; i < p.size(); i++)
        {
            b = n - p[i];
            if(__gcd(p[i],b) == 1)
            {
                cout << p[i] << " " << b << " " << 1 << endl;
                return;
            }
        }

    }
    else
    {
        cout << 2 << " " << n-3 << " " << 1 << endl;
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}