#include <bits/stdc++.h>
using namespace std;
#define int long long


void solve()
{
    
    int n,k;
    cin >> n >> k;
    
    if(n == 4 && k <= 3)
    {
        cout << "Yes" << endl;
        return;
    }

    if(n%2 == 0)
    {
        if(k <= 2)
        {
            cout << "Yes" << endl;
        }else cout << "No" << endl;
    }else 
    {
        if(k == 1) cout << "Yes" << endl;
        else cout << "No" << endl;
    }
    
}

int32_t main()
{
    int t = 1;
    // cin >> t;
    while(t--)
    {
        solve();
    }  
}
