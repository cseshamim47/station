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
    string str2 = str;
    int sz = str.size();
    bool found = false;
    int a = 0;
    int b = 0;
    for(int i = sz-2; i>=0; i--)
    {
        a = str[i]-'0';
        b = str[i+1]-'0';
        if(a+b >= 10)
        {
            string cc = to_string(a+b);
            str[i] = cc[0];
            str[i+1] = cc[1];
            found = true;
            break;
        }
    }
    if(!found)
    {
        a = str[0]-'0';
        b = str[1]-'0';
        string cc = to_string(a+b);
        str[1] = cc[0];
        str.erase(0,1);
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