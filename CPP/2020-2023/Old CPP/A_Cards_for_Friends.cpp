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
    int w,h,n;
    cin >> w >> h >> n;
    int cnt = 1;
    int i = 0;
    while(cnt < n)
    {
        if(w%2 == 0)
        {
            w/=2;
            cnt += pow(2,i);
            i++;
        }else if(h%2 == 0)
        {
            h/=2;
            cnt += pow(2,i);
            i++;
        }else break;
    }
    if(cnt >= n) cout << "YES" << endl;
    else cout << "NO" << endl;
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