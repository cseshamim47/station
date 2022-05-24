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
    int x,y,n;
    cin >> n >> x >> y;
    string str;
    cin >> str;

    int cnt = 0;
    for(int i = n-1; i >= (n-x-1); i--)
    {

        if(i == n-y-1 && str[i] == '0')
        {
            cnt++;
        }

        if(i == n-y-1 || i == n-x-1) continue;

        if(str[i] == '1') cnt++;
    }

    cout << cnt << endl;
}

// 11 5 2
// 11010000101



int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    // w(t)
    solve();
    // f();
}