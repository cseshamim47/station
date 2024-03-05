#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

vector<double> dig;

void precal()
{
    double x = 0;
    for(int i = 1; i <= MAX; i++)
    {
        x += log10(i);
        dig.push_back(x);
    }
    // cout << dig[6] << endl;
}
int Case;
void solve()
{
    int n,b;
    cin >> n >> b;

    double ans = dig[n]/log10(b);

    cout << "Case " << ++Case << ": " << (int)ans+1 << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    dig.push_back(1);
    precal();
    w(t)
    //solve();
}