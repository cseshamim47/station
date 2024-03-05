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
    int a = str.find('H');
    int b = str.find('Q');
    int c = str.find('9');
    if(a != string::npos || b != string::npos || c != string::npos) cout << "YES" << endl;
    else cout << "NO" << endl;

    // for(int i = 0; i < str.size(); i++)
    // {
    //     if(str[i] == 'H' or str[i] == 'Q' || str[i] == '9')
    //     {
    //         cout << "YES" << endl;
    //         return;
    //     }
    // }
    // cout << "NO" << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}