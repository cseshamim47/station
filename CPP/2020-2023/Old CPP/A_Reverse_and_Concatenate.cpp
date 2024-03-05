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
    string str;
    cin >> str;
    string cp = str;
    reverse(cp.begin(),cp.end());
    string ans1 = str+cp;
    string ans2 = cp+str;
    if(ans1 == ans2 || m == 0) cout << 1 << endl;
    else cout << 2 << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}