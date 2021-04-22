#include <iostream>
#include <math.h>
using namespace std;

bool isPrime(int n){
    int x = 2;
    while(x <= sqrt(n)){
        if(n%x==0) return false;
        x++; 
    }
    return true;
}

void primeFactor(int n){
    for(int i = 2; i<=n; i++){
        if(isPrime(i)){
            int x = i; // 
            
            while(n%x==0){
                cout << i << " ";
                x = x*i;
                // cout << x <<  " x" << endl;
            }
        }
    }
}


int main()
{
    primeFactor(27);
    
}