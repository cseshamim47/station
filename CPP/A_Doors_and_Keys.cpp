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
    map<char,int> mp;
    for(int i = 0; i < str.size(); i++)
    {
        if(isupper(str[i]) && mp[tolower(str[i])] == 10)
        {
            continue;
        }else if(isupper(str[i]))
        {
            cout << "NO" << endl;
            return;
        }
        mp[str[i]] = 10;
    }
    cout << "YES" << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}