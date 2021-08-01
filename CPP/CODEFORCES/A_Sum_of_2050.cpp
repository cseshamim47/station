#include <bits/stdc++.h>
using namespace std;
#define ll long long
#define w(t) while(t--){ solve(); }
vector<ll> v{2050,20500,205000,2050000,20500000,205000000,2050000000,20500000000,205000000000,2050000000000,20500000000000,205000000000000,2050000000000000,20500000000000000,205000000000000000};

void solve(){
    ll cnt = 0;
    ll n;
    cin >> n;
    int idx = lower_bound(v.begin(),v.end(),n) - v.begin();
    if(v[idx] > n || idx == v.size()) idx--;
    if(n < 2050){
        cout << -1 << endl;
        return;
    }
    ll mod = 0;
    while(true){
        mod = n%v[idx];
        cnt += (n/v[idx]);
        n = mod;
        if(mod == 0){
            cout << cnt << "\n";
            return;
        }
        if(n<2050){
            cout << -1 << endl;
            return;
        }
        idx--;
    }
}
int main()
{
     int t;   cin >> t;   w(t);
    
}