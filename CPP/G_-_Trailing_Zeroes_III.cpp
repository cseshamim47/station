#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

int trailing_zeros(int n)
{
    int f = 5;
    int cn = n;
    int fc = 0;
    while(cn >= f) fc+=cn/f,f*=5;
    int t = 2;
    int tc = 0;
    while(cn >= t) tc+=cn/t,t*=2;
    return min(tc,fc);

}
int Case;
void solve()
{
    int n;
    cin >> n;
    int l = 1;
    int r = 1e18;
    while(l < r)
    {
        int mid = l+(r-l)/2;
        if(trailing_zeros(mid) < n)
        {
            l = mid+1;
        }else 
        {
            r = mid;
        }
    }
    cout << "Case " << ++Case << ": ";
    if(trailing_zeros(l) == n) cout << l << endl;
    else cout << "impossible" << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}