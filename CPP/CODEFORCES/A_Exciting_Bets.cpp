//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define gch getchar();
#define cls system("cls");
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){
    ll a, b; cin >> a >> b;
    if(a == b){
        cout << 0 << " " << 0 << "\n";
    }else{
        ll maxGCD = abs(a-b);
        ll minSTEP = min(maxGCD-a%maxGCD, a%maxGCD);
        cout << maxGCD << " " << minSTEP << "\n";
    }
    

// Assume that a>b , if not then swap
// Now let us assume that after performing all operations our delta is k . So a->a+k  and b->b+k
// So gcd==gcd(a+k,k+k)
}

int main()
{
      //        Bismillah
     ll t;   cin >> t;   w(t);
    // cls


}