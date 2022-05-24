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
    int a[n];
    int b[n];
    
    for(int i = 0; i < n; i++)
    {
        cin >> a[i];
    }

    for(int i = 0; i < n; i++)
    {
       cin >> b[i];
    }
    
    int sum = 0;
    int ai = a[0];
    int bi = b[0];

    for(int i = 1; i < n; i++)
    {
        int x = abs(a[i]-ai)+abs(b[i]-bi);
        int y = abs(b[i]-ai)+abs(a[i]-bi);
        if(x > y)
        {
            sum += y;
            ai = b[i];
            bi = a[i];
        }else
        {
            sum += x;
            ai = a[i];
            bi = b[i];
        }
    }
    
    cout << sum << endl;
    
    
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