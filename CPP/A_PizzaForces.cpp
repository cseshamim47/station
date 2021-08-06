//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){
    ll slice;
    cin >> slice;
    
    if(slice<=6) cout << 15 << endl;
    else
    {
        if(slice%2 != 0) slice++;
        cout << (slice*5)/2 << "\n";
    }

}

int main()
{
      //        Bismillah
    int t;   cin >> t;   w(t);
    

}