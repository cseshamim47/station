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
    int mx = INT_MIN;
    vector<int> v(n,0);
    for(int i = 0; i < n; i++)  cin >> v[i], mx = max(mx,v[i]);
    if(mx != v[0] && mx != v[v.size()-1])
    {
        cout << -1 << endl;
        return;
    }
    else
    {
        if(mx == v[0]) reverse(v.begin()+1, v.end());
        else reverse(v.begin(),v.end()-1);
    }
    for(auto x : v) cout << x << " ";
    cout << endl;
    

}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}