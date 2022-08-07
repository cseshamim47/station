#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n,m;
    cin >> n >> m;
    
    if(m==1)
    {
        cout << "YES" << endl;
        for(int i = 1; i <= n; i++)
        {
            cout << i << endl;
        }
    }else if(n%2 == 0)
    {

        cout << "YES" << endl;
        int e = 2;
        int o = 1;
        for(int i = 1; i <= n; i++)
        {
            for(int j = 1; j <= m; j++)
            {
                if(i%2 != 0)
                {
                    cout << e << " ";
                    e+=2;
                }
                else
                {
                    cout << o << " ";
                    o+=2;
                }
            }
            cout << endl;
        }
    }else cout << "NO" <<endl;


}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}