#include <iostream>
using namespace std;

int isPrimeNumber(int n) {
   bool isPrime = true;

   for(int i = 2; i <= n/2; i++) {
      if (n%i == 0) {
         isPrime = false;
         break;
      }
   }  
   return isPrime;
}

int main() {
    int i, n,m;
    bool isPrime = true;
    cin >> m >> n;
    // 0 and 1 are not prime numbers
    if ((n == 0 || n == 1) && n%2==0 && n!=2) {
        isPrime = false;
    }
    else {
        for (i = 2; i <= n / 2; ++i) {
            if (n % i == 0) {
                isPrime = false;
                break;
            }
        }
    }

    int count = 0;
    bool isPrimeN;
    for(int i = m+1; i < n; i++){
        isPrimeN = isPrimeNumber(i);
        if(isPrimeN == true) count++;
    }

    if(isPrime && count==0){
        cout << "YES" << endl;
    }else cout << "NO" << endl;
    return 0;
}