//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){
    int k; 
    cin >> k;
    int w = 100 - k;
    int GCD = __gcd(k,w);
    k /= GCD;
    w /= GCD;

    cout << k+w << endl;
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);

}