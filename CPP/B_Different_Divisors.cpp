//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

bool isPrime(int prime){
    if(prime < 2) return false;
    for(int i = 2; i*i <= prime; i++){
        if(prime % i == 0) return false; 
    }
    return true;
}
vector<int>p;
vector<int> getPrime(int n){
    vector<int>primes;
    for(int i = 2; i <= n; i++){
        if(isPrime(i)) primes.push_back(i);
    }
    return primes;
}

void solve(){
    int n;
    cin >> n;
    ll x = 0;
    ll p1 = 0;
    ll p2 = 0;
    int i = 0;
    while(true){
        if(p[x]-1 >= n){
            p1 = p[x];
            // cout << p1 << endl;
            break;
        }
        x++; 
    }
    while(true){
        if(p[x]-p1 >= n){
            p2 = p[x];
            // cout << p2 << endl;
            break;
        }
        x++; 
    }
    cout << p1*p2 << endl;

}



int main()
{
      //        Bismillah
      p = getPrime(30000);
    //   for(auto it : p) cout << it << " ";
     int t;   cin >> t;   w(t);
   
}