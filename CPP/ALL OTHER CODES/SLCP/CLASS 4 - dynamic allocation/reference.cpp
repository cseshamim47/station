//Author :   Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <iostream>
using namespace std;
#define MAX 10000005

void f(int &a)
{
    a++;
}

int& fn()
{
    int x = 10;
    return x; 
}

int* fnn()
{
    int x = 22;
    return &x;
}

int main()
{
    int a = 50;    
    cout << a << endl;
    f(a);
    cout << a << endl;

    int &x = fn();
    int *xn = fnn();
    cout << xn << endl;
    
}