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
    if(str[0] != '-') cout << str << endl;
    else
    {
        int sz = str.size();
        if(str[sz-2] < str[sz-1]) str.erase(sz-1,1);
        else str.erase(sz-2,1);
        if(str.size() == 2 && str == "-0") str.erase(0,1);
        cout << str << endl;
    } 
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}