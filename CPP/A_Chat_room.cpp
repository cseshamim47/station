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
    string f = "hello";
    string ans = "";
    for(int i = 0; i < str.size(); i++)
    {
        if(f[0]==str[i])
        {
            ans+=str[i];
            f.erase(0,1);
        }
    }
    if(ans != "hello")
    {
        cout << "NO" << endl;
    }else cout << "YES" << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}