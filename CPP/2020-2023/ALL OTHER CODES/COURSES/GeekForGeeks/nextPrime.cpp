#include <iostream>
using namespace std;
bool isPrime(int x);
int isPrime2(int x);
int main()
{
    int n;
    cin >> n;

    // while(true){
    //     n++;
    //     if(isPrime(n)){
    //         cout << n << endl;
    //         break;
    //     }
    // }

    //another approach 

   cout << isPrime2(n);

    
}


// bool isPrime(int x){

//     int count = 0;
//     for(int i = 2; i <= x/2; i++){
//         if(x%i==0) count++;
//     }
//     if(count == 0) return true;
//     else return false;
// }

int isPrime2(int x){
    x++;

    while(true){
        int i; 
        for(i = 2; i < x; i++){
            if(x%i==0) break;
        }
        if(i==x) return i;
        x++;
    }    
}
