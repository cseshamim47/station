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
    int q;
    cin >> q;
    map<char,char> mp;

    for(int i = 0; i < s(str); i++)
    {
        mp[str[i]] = str[i];
    }

    while(q--)
    {
        char a, b;
        cin >> a >> b;
        
        for(char i = 'A'; i <= 'Z'; i++)
        {
            if(mp[i] == b) mp[i] = a;
        }
    }

    for(int i = 0; i < str.size(); i++)
    {
        cout << mp[str[i]];
    }
    cout << endl;
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