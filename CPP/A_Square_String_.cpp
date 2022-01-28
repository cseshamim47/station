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

    int len = str.size();

    if(len % 2 != 0)
    {
        cout << "NO" << endl;
        return;
    }
    int n = len/2;
    int j = len/2;
    for(int i = 0; i < n; i++)
    {
        if(str[i] != str[j])
        {
            cout << "NO" << endl;
            return;
        }
        j++;
    }
    cout << "YES" << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    // solve();
}