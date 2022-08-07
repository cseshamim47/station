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
    char c;
    cin >> str >> c;
    int sz = str.size()-1;

    for(int i = 0; i <= sz; i++)
    {
        if(str[i] == c && i % 2 == 0 && (sz-i)%2 == 0)
        {
            cout << "YES" << endl;
            return;
        }
    }
    cout << "NO" << endl;

}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}