//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){
    int Ar,Ac,Br,Bc,Fr,Fc;
    cin >> Ar >> Ac >> Br >> Bc >> Fr >> Fc;
    if(Ar > Br || Ac > Bc){
        swap(Ar,Br);
        swap(Ac,Bc);
    }
    int ans = abs(Ar-Br) + abs(Ac-Bc);
    if((Ar == Fr && Br == Fr ) || (Ac == Fc && Bc == Fc)){
        if((Ac < Fc && Fc < Bc) || (Ar < Fr && Fr < Br)) ans += 2;
    }
    cout << ans << endl;
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    

}