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
    
    for(int i = 1; i<10; i++){
        ll x = 0;
        for(int j = 1; j<10; j++){
            x = x*10+i; 
            if(x>n) break;
            else cnt++;
        }
    }

    cout << cnt << "\n";
    cnt = 0;
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    
}
