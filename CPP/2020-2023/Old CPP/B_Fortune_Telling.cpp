#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n,a,f;
    cin >> n >> a >> f;
    vector<int> v(n,0);
    int sum = a;
    for(int i = 0; i < n; i++)
    {
        cin >> v[i];
        sum += v[i];
    }
    if((sum & 1 && f & 1) || (sum%2==0 && f%2==0)) cout << "Alice" << endl;
    else cout << "Bob" << endl;

}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}