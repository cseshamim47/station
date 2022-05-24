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
    int sec[n];
    int dam[n];
    for(int i = 0; i < n; i++) cin >> sec[i];
    for(int i = 0; i < n; i++) cin >> dam[i];

    int prevPoint = sec[n-1];
    int prevCost = dam[n-1];

    int ans = 0;
    for(int i = n-2; i >= 0; i--)
    {
        if(prevPoint-prevCost >= sec[i])
        {
            ans += (prevCost*(prevCost+1)/2);
            prevPoint = sec[i];
            prevCost = dam[i];
        }else if(prevCost - (prevPoint - sec[i]) >= dam[i])
        {
            continue;
        }else
        {
            prevCost = dam[i]+(prevPoint-sec[i]);
            prevPoint = sec[i];
        }
    }
    ans += (prevCost*(prevCost+1)/2);
    cout << ans << endl;

}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
    //f();
}