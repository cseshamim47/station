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

void f()
{}

int Case;
void solve()
{
    int n;
    cin >> n;
    if(n < 0)
    {
        cout << "total second must be a positive integer" << endl;
        return;
    }
    int min = n/60;
    int hour = 0;
    if(min >= 60)
    {
        hour = min/60;
        min %= 60;

    }
    int sec = n%60;

    if(hour < 10) cout << 0 << hour;
    else cout << hour;
    cout << ":";
    if(min < 10) cout << 0 << min;
    else cout << min ;
    cout << ":";
    if(sec < 10) cout << 0 << sec;
    else cout << sec;
    cout << endl;
    
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
    //f();
}