//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define MOD 1000000007
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;
ll lcm(ll a, ll b){
    return a*b/__gcd(a,b);
}
void solve(){
    ll n;
    cin >> n;
    ll a=1,b=2;
    ll lcd = 1;
    ll ans = 0;
    ll remain = n;
    ll x = n;
    while(true){
        lcd = lcm(lcd,b);
        if(n/lcd == 0){
            ans = (ans%MOD + (remain%MOD * b%MOD) % MOD) % MOD;
            break;
        }
        x = remain - (n/lcd); // 15 -> 10 -> 3
        remain = remain - x; // 15 -> 5 -> 2
        ans = (ans%MOD + (x%MOD * b%MOD) % MOD) % MOD;
        b++;
    }
    cout << ans << "\n";
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    // cout << lcm(1,2) << endl;

}