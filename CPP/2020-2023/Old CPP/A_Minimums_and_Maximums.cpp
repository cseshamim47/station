#include <bits/stdc++.h>
using namespace std;

#define fo(i,n) for(i=0;i<n;i++)
#define vi vector<int>
#define pb push_back
#define pf push_front
#define deb(x) cout << #x << "=" << x << endl
#define deb2(x, y) cout << #x << "=" << x << "," << #y << "=" << y << endl
#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define nl printf("\n");
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

struct{
    template<class T> operator T() {
        T x;
        cin >> x;
        return x;
    }
}in;

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
    int i,j,m,n;
    int a = in, b = in, c = in, d = in;

    int ans = max(a,c);
    if(a == c) cout << a << endl;
    else if(a <= c && b >= c) cout << c << endl;
    else if(c <= a && d >= a) cout << a << endl;
    else if(b < c || a > d) cout << a+c << endl;

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