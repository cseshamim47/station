//                             fib(5)   
//                      /                 \        
//                fib(4)                  fib(3)   
//              /      \                /       \
//          fib(3)      fib(2)         fib(2)    fib(1)
//         /   \          /    \       /      \ 
//   fib(2)   fib(1)  fib(1) fib(0) fib(1) fib(0)
//   /    \ 
// fib(1) fib(0) 

// In the above tree fib(3), fib(2), fib(1), fib(0) all are called more then once.

#include <bits/stdc++.h>
using namespace std;
int term[1000];
int fibonacci(int n);
int main()
{
    int n;
    cin >> n;

    cout << fibonacci(n);
}

int fibonacci(int n){
    if(n <= 1) return 1;

    if(term[n] != 0) return term[n];
    else{
        term[n] = fibonacci(n - 1) + fibonacci(n - 2);
        return term[n];
    }
}