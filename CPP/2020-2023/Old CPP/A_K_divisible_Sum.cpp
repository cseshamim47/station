//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){
    ll n,k;
    cin >> n >> k;
    if(n==k) cout << 1 << "\n";
    else if(n<k){
        if(k%n==0) cout << k/n << "\n";
        else cout << (k/n) + 1 << "\n";
    }else{
        if(n%k == 0) cout << 1 << "\n";
        else cout << 2 << "\n";
    }
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    

}