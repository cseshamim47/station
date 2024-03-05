#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{}

int main()
{
    ll m,n,a;
    cin >> m >> n >> a;
    ll ans = ceil(1.00*m/a)*ceil(1.00*n/a);
    cout << ans << endl;
}