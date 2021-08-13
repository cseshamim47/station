//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }

void solve(){
    ll cnt = 0;
    int n;
    cin >> n;
    ll arr[n+4];
    for(int i = 0; i < n; i++){
        cin >> arr[i];
    }

    ll ans = arr[0];
    for(int i = 1; i < n; i++){
        ans = max(ans,arr[i]*arr[i-1]);
    }
    cout << ans << "\n";
}

int main()
{
      //        Bismillah
    int t;   cin >> t;   w(t);
    

}
