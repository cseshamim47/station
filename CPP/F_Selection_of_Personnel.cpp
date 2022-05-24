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
    int ans1 = 1;
    int ans2 = 1;
    int ans3 = 1;
    int x = 1;
    for(int i = n; i >= (n-5+1); i--)
    {
        ans1 *= i;
        ans1/=x;
        x++;
    }
    // ans1/=120;
    x = 1;
    for(int i = n; i >= (n-6+1); i--)
    {
        ans2 *= i;
        ans2/=x;
        x++;
    }
    // ans2/=720;
    x= 1;
    for(int i = n; i >= (n-7+1); i--)
    {
        ans3 *= i;
        ans3/=x;
        x++;
    }
    // ans3/=5040;
    cout << ans1+ans2+ans3 << endl;
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