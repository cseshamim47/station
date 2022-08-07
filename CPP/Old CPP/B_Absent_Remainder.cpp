#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    vector<int> v(n,0);
    int two = 0;
    for(int i = 0; i < n; i++)
    {
        cin >> v[i];
    } 
    int cnt = n/2;
    sort(v.begin(),v.end());
    int mn = v[0];
    for(int i = 1; i < n; i++)
    {
        cout << v[i] << " " << mn << endl;
        cnt--;  
        if(cnt == 0) break;
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}