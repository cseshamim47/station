#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{
    ll n, w;
    cin >> n >> w;
    int k = w; 
    vector<ll> ans;
    ll sum = 0,single = 0;
    for(ll i = 1; i <= n; i++)
    {
        ll x;
        cin >> x;
        if(x <= w)
        {
            if(x >= (w+1)/2) single = i;
            else if(sum < (w+1)/2) ans.push_back(i),sum += x;
        }
    }

    w = (w+1)/2;
    if(single) cout << 1 << "\n" << single << endl;
    else if(sum >= w)
    {
        cout << ans.size() << endl;
        for(auto x : ans) cout << x << " ";
        cout << endl;
    }else cout << -1 << endl;
}

int main()
{
      //        Bismillah
    w(t)
    
}