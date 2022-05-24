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
{
    cout << gcd(4,10) << endl;
}

int Case;
void solve()
{
    int n,r;
    while(cin >> n >> r)
    {
        if(n == 0 && r == 0) return;
        int a=n,b = r;
        int nn = 1,rr=1;
        if(r != 0)
        {
            while(r)
            {
                nn*=n;
                rr*=r;

                int g = gcd(nn,rr);
                nn/=g;
                rr/=g;
                n--;
                r--;
            }
        }else
        {
            nn = 1;
        }

        printf("%lld things taken %lld at a time is %lld exactly.\n", a,b,nn);
    }
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