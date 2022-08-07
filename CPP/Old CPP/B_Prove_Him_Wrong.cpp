#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    if(n > 19) cout << "NO" << endl;
    else
    {
        cout << "YES" << endl;
        for(int i = 0; i < n; i++)
        {
            int n = pow(3,i);
            cout << n << " ";
        }
        cout << endl;
    }

   
  

}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}

//  1 2 3 4
//  1 2
//  1 3
//  1 4
//  2 3
//  2 4
//  3 4