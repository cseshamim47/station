#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    string s1,s2,s3,s4;
    cin >> s1 >> s2 >> s3 >> s4;
    string ans = "";
    for(int i = 0; i < (int)s4.size(); i++)
    {
        if(s4[i] == '1') ans += s1;
        else if(s4[i] == '2') ans += s2;
        else ans += s3;
    }
    cout << ans << endl;
}

int32_t main()
{
      //        Bismillah
    solve();    
}