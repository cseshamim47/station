#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    string str;
    cin >> str;

    int sz = str.size();
    int cnt = 0;
    for (int i = sz-1; i >= 0; i--)
    {
        if((str[i]-'0')%2 == 0)
        {
            cnt = 1;
        }   
    }

    if((str[sz-1]-'0') % 2 == 0)
    {
        cout << 0 << endl;
    }else if((str[0]-'0')%2 == 0)
    {
        cout << 1 << endl;
    }else if(cnt)
    {
        cout << 2 << endl;
    }else cout << -1 << endl;
    
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}