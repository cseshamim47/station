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
    string str;
    cin >> str;
    int one = 0;
    for(int i = 0; i < str.size(); i++)
    {
        if(str[i]=='1') one++;
    }
    if(one > 1 || n-one > 1) cout << "NO" << endl;
    else cout << "YES" << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}