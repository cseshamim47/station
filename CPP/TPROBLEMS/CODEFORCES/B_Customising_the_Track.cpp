//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){
    ll size;
    cin >> size;
    ll arr[size];
    for(ll i = 0; i < size; i++){
        cin >> arr[i];
        cnt+=arr[i];
    }
    ll div = cnt/size;
    ll mod = cnt % size;
    cout << abs(size-mod)*mod << endl;
    cnt = 0;
    // for(auto &i : arr) cout << i << " ";
}

int main()
{
      //        Bismillah
     ll t;   cin >> t;   w(t);
    
}