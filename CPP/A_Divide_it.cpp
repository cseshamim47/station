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

    int cnt = 0;
    while(n != 1)
    {
        int prevN = n;
        if(n%2 == 0) n/=2;
        else if(n%3 == 0)
        {
            n *= 2;
            n/=3;
        }else if(n%5 == 0)
        {
            n*=4;
            n/=5;
        }
        cnt++;
        if(prevN == n) 
        {
            cnt = -1;
            break;
        }
    }
    cout << cnt << endl;
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