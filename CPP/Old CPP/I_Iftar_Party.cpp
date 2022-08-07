#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

int Case;
void solve()
{
    ll p,l;
    cin >> p >> l;
    ll ate = p-l;
    cout << "Case " << ++Case << ":";
    ll cnt = 0;
    ll k = ate;
    // set<ll> s;
    vector<ll> v;
    if(k > l)
    for(ll i = 1; i*i <= k; i++)
    {
        if(k % i == 0)
        {
            ll sym = k/i;
            if(i > l)
            {
                // s.insert(i);
                v.push_back(i);
                cnt = 1;
            }
            if(sym > l && sym != i)
            {
                // s.insert(sym);
                v.push_back(sym);
                cnt = 1;
            }
        }
    }
    if(!cnt)
    {
        if(k > l) cout << " " << k << "\n";
        else cout << " impossible" << "\n";
        return;
    }
    // for(auto it : s) cout << " " << it;
    sort(v.begin(),v.end());
    for(ll i = 0; i < (ll)v.size(); i++) cout << " " << v[i];
    cout << "\n";
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    w(t)
}