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

int f(int n)
{
    if(n%2 == 0) return 2;
    else return 1;
}

int Case;
void solve()
{
    int n,m;
    cin >> n >> m;

    if(n > m) swap(n,m);

    int dist = (2*n)-2;
    dist += ((m-n)*2);
    if(f(n) != f(m)) dist--;
    // if(m-n == 1) dist--;
    if(m>2 && n == 1) dist = -1;
    if(n == 1 && m == 1) dist = 0;
    cout << dist << endl;
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