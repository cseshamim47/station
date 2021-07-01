//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define MAX 10000005
#define ll long long
#define gch getchar();
#define cls system("cls");
#define dbg cout << "Debug LN : " << __LINE__ << endl;
#define w(t) while(t--){ solve(); }

void solve(){ }

bool primes[MAX];

bool isPrime(int prime){
    if(prime < 2) return false;
    if(prime == 2) return true;
    if(prime % 2 == 0) return false;
    return primes[prime] == false;
}

void getPrime(int n){
    for(int i = 3; i*i <= n; i+=2){
        if(primes[i] == false){
            for(int j = i*i; j <= n; j += i)
                primes[j] = true;
        }
    }
}
    


int main()
{
     //        Bismillah
    // int t;   cin >> t;   w(t);
    cls

    // cout << (isPrime(29) ? "Prime" : "Not Prime") << "\n";
    int n;
    cin >> n;

    getPrime(n);
    for(int i = 0; i <= n; i++){
        if(!isPrime(i)){
            // if(i != 2) cout << " - ";
            cout << i;
        }else cout << "[" << i << "]";  

        if(i != n) cout << " - "; 
        
    }
}

/* 
O(N) solution: 
bool isPrime(int prime){
    if(prime < 2) return false;
    for(int i = 2; i < prime; i++){
        if(prime % i == 0) return false; 
    }
    return true;
} 
*/


/* 
O(sqrt(N)) solution:
bool isPrime(int prime){
    if(prime < 2) return false;
    for(int i = 2; i <= sqrt(prime); i++){
        if(prime % i == 0) return false; 
    }
    return true;
}
 */

/* 
for 2-n prime numbers : TC --> O(N*sqrt(N))
bool isPrime(int prime){
    if(prime < 2) return false;
    for(int i = 2; i*i < prime; i++){
        if(prime % i == 0) return false; 
    }
    return true;
}

vector<int> getPrime(int n){
    vector<int>primes;
    for(int i = 2; i <= n; i++){
        if(isPrime(i)) primes.push_back(i);
    }
    return primes;
}
 */
