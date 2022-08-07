#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

int Case;
void solve()
{
    double a,b,c,ratio;
    cin >> a >> b >> c >> ratio;
    cout << "Case " << ++Case << ": ";
    double ans = sqrt(ratio / (ratio + 1)) * a;
    cout << setprecision(10) << fixed << ans << endl;
}

int main()
{
      //        Bismillah
    w(t)
}