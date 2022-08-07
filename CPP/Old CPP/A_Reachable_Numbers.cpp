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
    
    int cnt = 1;

    if(n < 10) cnt--;
    n++;


    while(s(to_string(n)) != 1)
    {
        if(n%10 == 0)
        {
            n/=10;
            continue;
        }
        cnt++;
        n++;
        // cout << n << endl;
    }
    // cout << n << " " << cnt << endl;
    
    if(n <= 10)
    {
        cnt += (10-n)+(n-1);
    }
    cout << cnt << endl;
}
// 1098 1099 1100

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    // w(t)
    solve();
    // f();
}