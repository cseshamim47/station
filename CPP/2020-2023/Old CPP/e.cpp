#include <bits/stdc++.h>
using namespace std;

#define fo(i,n) for(i=0;i<n;i++)
#define deb(x) cout << #x << "=" << x << endl
#define deb2(x, y) cout << #x << "=" << x << "," << #y << "=" << y << endl
#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
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
    double i,j,m,n;
    n = in;
    double a = in, b = in, s = in;

    if(n <= 2 && a+b != s && a != b)
    {
        cout << "NO" << endl;
    }else if(n <= 2)
    {
        if(n == 1 && a == b && b == s) cout << "YES" << endl;
        else if(n == 2 && a+b == s) cout << "YES" << endl;
        else cout << "NO" << endl;
    }else 
    {
        // if(a*n <= s && b*n >= s) cout << "YES" << endl;
        // else cout << "NO" << endl;

        n-=2;
        s-=a;
        s-=b;
        if(s/n >= a && s/n <= b)
        {
            cout << "YES" << endl;
        }else cout << "NO" << endl;
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