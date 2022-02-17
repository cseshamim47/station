#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n, s, u;
    cin >> n >> s >> u;
    string str = "";
    char ch = 'a',reset = 'a';
    int cu = u;
    while(n--)
    {
        str.push_back(ch++);
        u--;
        if(u == 0)
        {
            u = cu;
            ch = reset;
        }
    }
    cout << str << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}