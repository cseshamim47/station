//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){
    ll a,b,n;
    cin >> a >> b >> n;
    ll x = min(a,b)*(n+1);
    ll mx = max(a,b);
    if(x >= mx) cout << "YES" << "\n";
    else cout << "NO" << "\n";
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    

}

