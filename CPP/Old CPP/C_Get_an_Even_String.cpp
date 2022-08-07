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

void fileInput()
{
    #ifndef ONLINE_JUDGE
        freopen("input.txt", "r", stdin);
        freopen("output.txt", "w", stdout);
    #endif
}

int gcd(int a, int b)
{
    if(!b) return a;
    return gcd(b,a%b);
}

void f()
{}

int Case;
void solve()
{
    string str;
    cin >> str;

    int cnt = 0;
    string ans = "";
    map<char,int> mp;
    for(int i = 0; i+1 < s(str); i++)
    {
        if(str[i] == str[i+1])
        {
            ans += str[i];
            ans += str[i+1];
            i++;
        }else
        {
            while(i < s(str) && mp[str[i]] != 1)
            {
                mp[str[i]] = 1;
                i++;
            }
            if(i < s(str))
            {
                ans += str[i];
                ans += str[i];
            }
            mp.clear();
        }

    }

    cout << s(str) - s(ans) << endl;
    
    

    // for(auto x : v) 
    // {
    //     for(auto y : x) cout << y << " "; cout << endl;
    // }
}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    w(t)
    // solve();
    // f();
}