#include <bits/stdc++.h>
using namespace std;

#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
// #define int long long
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

int f(int a)
{
    if(a%2==0) return 2;
    else return 1;
}

int Case;
void solve()
{
    int a, b;
    cin >> a >> b;
    if(a==b) cout << 0 << endl;
    else if(a < b && f(a) == f(b))
    {
        cout << min((b-a),2) << endl;
    }else if(a < b && f(a) != f(b)) cout << 1 << endl;
    if(a > b)
    {
        if(f(a) == f(b))
        cout << 1 << endl;
        else cout << 2 << endl;
    }
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