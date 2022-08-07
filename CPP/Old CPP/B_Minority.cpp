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
    int one = 0;
    int zero = 0;
    int ans = 0;
    for(int i = 0; i < str.size(); i++)
    {
        if(str[i] == '0') zero++;
        else one++;
        if(zero!=one) ans = min(zero,one);
    }

    cout << ans << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}

// 00000111110110