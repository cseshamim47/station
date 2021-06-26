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

int main()
{
     //        Bismillah
    // int t;   cin >> t;   w(t);
    cls

    cout << (isPrime(29) ? "Prime" : "Not Prime") << "\n";

    for(auto it : getPrime(31)) cout << it << " - ";  

    cout << pow(10)


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
vector<int> getPrime(int n){
    vector<int>primes;
    for(int i = 2; i <= n; i++){
        if(isPrime(i)) primes.push_back(i);
    }
    return primes;
}
 */
