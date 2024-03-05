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
    string str;
    cin >> n >> str;
    string ans = "";
    ans += str[0];
    for(int i = 1; i < n; i++)
    {
        if(str[i-1] == str[i] && i == 1)
        {
            break; 
        }
        if(str[i-1] >= str[i]) ans += str[i];
        else break;
    }
    // if(ans == "") ans += str[0];
    cout << ans;
    reverse(ans.begin(),ans.end());
    cout << ans << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}