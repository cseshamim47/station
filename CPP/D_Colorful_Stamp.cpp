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
    int n;
    cin >> n;
    string str;
    cin >> str;

    bool parbi = true;
    if(n == 1 && str[0] != 'W') parbi = false;

    int r = 0;
    int b = 0;
    for(int i = 0; i < n; i++)
    {
        if(str[i] == 'W')
        {
            if(r+b > 0 && (r == 0 || b == 0)) parbi = false;
            r = 0;
            b = 0;
        }

        if(str[i] == 'R') r++;
        else if(str[i] == 'B') b++;
    }

    if(r+b > 0 && (r == 0 || b == 0)) parbi = false;
    if(parbi) cout << "YES" << endl;
    else cout << "NO" << endl;

}

int32_t main()
{
    // fileInput()
    // BOOST
    w(t)
    // solve();
    // f();
}