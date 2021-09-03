//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;

#define MAX 32000
#define ll long long

vector<int> primes;

void sieve(){
    bool isPrime[MAX+7];
    for(int i = 0; i < MAX; i++) isPrime[i] = true;
    
    for(int i = 3; i*i <= MAX; i+=2){
        if(isPrime[i]){
            for(int j = i*i; j <= MAX; j += i){
                isPrime[j] = false;
            }
        }
    }

    primes.push_back(2);
    for(int i = 3; i < MAX; i+=2){
        if(isPrime[i]) primes.push_back(i);
    }
    // for(int i = 0; i < 10; i++){
    //     cout << primes[i] << endl;
    // }
}

void segSieve(ll l, ll r){
    ll size = r-l+1;
    bool isPrime[size];
    for(int i = 0; i < size; i++) isPrime[i] = true;
    if(l==1) isPrime[0] = false;

    for(int i = 0; primes[i]*primes[i] <= r; ++i){
        int CP = primes[i];
        ll start = ((l+CP-1)/CP) * CP;
        // if(start < l) start += CP;
        for(ll j = start; j <= r; j+=CP){
            if(j-l >= 0)
                isPrime[j-l] = false;
            if(j-l<0)
            cout << "-- " << j-l << endl; 
        }
        if(CP == start) isPrime[start-l] = true;
    }

    for(int i = 0; i < size; i++){
        // if(isPrime[i])
            // cout << (l+i) << endl;
    }
}





int main()
{
    int t;
    sieve();
    cin >> t;
    while(t--){
        ll l,r;
        cin >> l >> r;
        segSieve(l,r);
        cout << "\n";
    }

    
}


/* 
naive approach
bool isPrime(int prime){
    if(prime < 2) return false;
    if(prime>2)
        for(int i = 2; i < prime; i++){
            if(prime%i == 0) return false;
        }
    return true;
}
*/