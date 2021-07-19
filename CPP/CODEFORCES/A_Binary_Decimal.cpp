//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){
    ll n;
    cin >> n;

    ll ans = 0; 
    while(n>0){
        ans = max(ans,n%10);
        n /= 10;
    }

    cout << ans << endl;

}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    

}