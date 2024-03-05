#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    string str,str2;
    cin >> str >> str2;

    unordered_map<char,int> mp;

    for(int i = 0; i < str.size(); i++)
    {
        mp[str[i]]++;
    }

    string x = str;
    sort(x.begin(),x.end());
    if(x[0] != str2[0] || x.size() < str2.size())
    {
        cout << x << endl;
        return;
    }
    // sort(str2.begin(),str2.end());
    for(int i = 0; i < mp[str2[0]]; i++)
    {
        cout << str2[0];      
    }

    for(int i = 0; i < mp[str2[2]]; i++)
    {
        cout << str2[2];      
    }

    for(int i = 0; i < mp[str2[1]]; i++)
    {
        cout << str2[1];      
    }

    sort(str.begin(),str.end());

    for(int i = 0; i < str.size(); i++)
    {
        if(str[i] != 'a' && str[i] != 'b' && str[i] != 'c') cout << str[i];
    }

    cout << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}