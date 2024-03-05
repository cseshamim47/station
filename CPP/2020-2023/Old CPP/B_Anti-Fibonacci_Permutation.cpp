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
    int cn = n;
    cn++;
    while(cn--)
    {
        cout << cn << " ";
        for(int i = n; i >= 1; i--)
        {
            if(cn == i) continue;
            cout << i << " ";
        }
        cout << endl;
        if(cn == 1) break;
    }


}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}