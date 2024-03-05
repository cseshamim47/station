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

    int ans = INT_MAX;
    for(int i = str.size()-1; i >= 0; i--)
    {
        if(str[i]=='5' || str[i]=='0')
        {
            int cnt = INT_MAX;
            for(int j = i-1; j >= 0; j--)
            {
                int r = str.size()-1-i;
                int m = i-j-1;
                if(str[i] == '5' && (str[j] == '2' || str[j] == '7'))
                {
                    cnt = min(cnt,r+m);
                }else if(str[i] == '0' && (str[j] == '5' || str[j] == '0'))
                {
                    cnt = min(cnt,r+m);
                }
                ans = min(ans,cnt);
            }       
        }
    }
    cout << ans << endl;

    // 25
    // 50
    // 75
    // 00
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}