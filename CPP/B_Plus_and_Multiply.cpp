//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){
    ll n,a,b;
    cin >> n >> a >> b;
    if(a == 1){
        if((n-1)%b == 0) cout << "Yes" << "\n";
        else cout << "No" << "\n";
        return;
    }
    ll set = 1;
    while(set<=n){
        if((n-set)%b == 0){
            cout << "Yes" << "\n";
            return;
        }
        set *= a;
    }
    cout << "No" << "\n"; 
}

int main()
{
    
    int t;   cin >> t;   w(t);
    

}