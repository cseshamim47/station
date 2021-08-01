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
    ll x,y;
    cin >> n;
    x = n/3;
    y = n/3;

    if(n%3 == 1) cout << ++x << " " << y << endl;
    else if(n%3 == 2) cout << x << " " << ++y << endl;
    else cout << x << " " << y << endl;  
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    

}