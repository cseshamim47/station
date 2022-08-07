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
    if(s(str) == 1)
    {
        cout << 0 << endl;
        return;
    }
    int cur = -1;
    for(int i = 0; i+1 < s(str); i++)
    {
        if(str[i] == '-' && str[i+1] == '.')
        {
            i++;
            cout << 1;
            cur = i;
        }else if(str[i] == '-' && str[i+1] == '-')
        {
            i++;
            cout << 2;
            cur = i;
        }else 
        {
            cout << 0;
            cur = i;
        }
    }
    if(cur == s(str)-2) cout << 0;
    cout <<endl;
}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    // w(t)
    solve();
    // f();
}