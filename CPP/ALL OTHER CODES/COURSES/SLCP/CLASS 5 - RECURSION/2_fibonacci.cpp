#include <bits/stdc++.h>
using namespace std;

int fib(int n)
{
    if(n == 0) return 0;
    if(n == 1) return 1;

    int smallOutPut1 = fib(n-1);
    int smallOutPut2 = fib(n-2);

    return smallOutPut1 + smallOutPut2;
}

int main()
{
    //    Bismillah
    cout << fib(4) << endl;
}