#include <bits/stdc++.h>
using namespace std;

#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

string bruteforce(string str,int x)
{
    // int x = 634;
    map<char,int> mp;
    for(int ch = 'A'; ch <= 'Z'; ch++)
    {
        mp[ch] = x++;
    }

    // string str = "ABCDEF";
    string nstr = "";
    for(int i = 0; i < str.size(); i++)
    {
        nstr += to_string(mp[str[i]]);
    }
    // cout << nstr << endl;

    string n = "";
    int i = 0;
    while(nstr.size() > 3)
    {
        int a,b;
        a = nstr[i]-'0';
        b = nstr[i+1]-'0';
        string tmp = to_string((a+b));
        n += tmp[tmp.size()-1];
        i++;
        if(i+1 == nstr.size())
        {
            nstr = n;
            // cout << n << endl;
            n = "";
            i = 0;
            // getchar();
        }  
    }
    return nstr;
}

int Case;

void solve()
{
    string str = "MOCKXX";
    int t = 50;
    while(cin >> str)
    {
        bool f = false;
        for(int i = 1; i <= 10000; i++)
        {
            if(bruteforce(str,i) == "100") 
            {
                f = true;
                cout << i << endl;
                break;
            }
            // cout << i << " " << bruteforce("JYFTYR",i) << endl;
            // getchar();
        }
        if(!f) cout << ":(" << endl;
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
    // bruteforce();
}