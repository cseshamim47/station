#include <bits/stdc++.h>
using namespace std;

#define ll long long
#define sol() int t; cin >> t; while(t--){ solve(); }

bool isPrime(ll n){
    if(n < 2) return false;
    for(ll i = 2; i*i <= n; i++){
        if(n % i == 0) return false; 
    }
    return true;
}

void solve(){
    ll cnt = 0;
    ll a;
    cin >> a;
    ll root = sqrt(a);
    if(root*root != a)
    {
        cout << "NO\n";
        return;
    }else if(isPrime(root)){
        cout << "YES\n";
    }else cout << "NO\n";
}

int main()
{
    ios::sync_with_stdio(0);
    cin.tie(0);
    sol()
}