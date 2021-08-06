//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){
    ll a,b;
    cin >> a >> b;
    if(b == 1) cout << "NO" << "\n";
    else{
        cout << "YES" << "\n";
        cout << a << " " << a*b << " " << a*(b+1) << endl;
    }
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    

}