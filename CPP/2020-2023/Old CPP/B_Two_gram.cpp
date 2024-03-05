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
    map<string,int> mp;
    for(int i = 0; i+1 < str.size(); i++)
    {
        string tmp = "";
        tmp.push_back(str[i]);
        tmp.push_back(str[i+1]);
        mp[tmp]++;
    }
    int ans = 0;
    for(auto x : mp)
    {
        if(ans < x.second)
        {
            str = x.first;
            ans = x.second;
        }
    }
    cout << str << endl;

}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}