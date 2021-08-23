//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){
    ll r,c,b;
    cin >> r >> c >> b;
    ll cCnt = c-1;
    ll rCnt = (r-1)*c;
    ll sum = cCnt+rCnt;
    if(sum == b) cout << "YES" << "\n";
    else cout << "NO" << "\n";
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    

}