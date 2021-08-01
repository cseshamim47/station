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
    ll ans = 1e18;
    for(int i = 0; i*i <= a; i++){
        if(i == 0 && b == 1) continue;
        ll cnt = i;
        ll tmp = a;
        while (tmp)
        {
            tmp /= (b+i);
            cnt++;
        }
        ans = min(ans,cnt);   
    }
    cout << ans << "\n";
}

int main()
{
      //        Bismillah
    int t;   cin >> t;   w(t);
    

}