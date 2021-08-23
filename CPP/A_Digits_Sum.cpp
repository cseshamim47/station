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
    int x = n/10;
    if(n%10 == 9) cout << x+1 << endl;
    else cout << x << endl;
    
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    

}


/*

x = 9 
x + 1 = 10
1 < 9 true

x = 10
x+1 = 11

2 < 1 false

x = 100
x+1 = 101
2 < 1 false

x = 199
x+1 = 200
2 < 19 true

x = 19 
x + 1 = 20
2 < 10 true

*/