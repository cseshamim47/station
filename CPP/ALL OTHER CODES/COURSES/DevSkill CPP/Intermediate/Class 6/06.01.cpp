#include <bits/stdc++.h>

using namespace std;

int fact(int n) {
    if(n == 0) return 1;
    return n * fact(n-1);
}

int fib(int n) {
    if(n < 2) return n;
    return fib(n-1) + fib(n-2);
}

/*
    for(int i=1; i<=n; i++) {
        printf("%d\n", i);
    }
*/
int print(int n) {
    if(!n) return 0;
    print(n-1);
    printf("%d\n", n);
}

int main() {
    print(7);
}
