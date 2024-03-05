#include <bits/stdc++.h>
using namespace std;

int gcd(int a,int b)
{
    if(b == 0) return a;
    return gcd(b,a%b);
}

void iterativeGCD()
{
    int a = 126;
    int b = 120;
    while(b)
    {
        int tmp = a;
        a = b;
        b = tmp%b;        
    }
    cout << a << endl;
}

int main()
{
    cout << gcd(44,12) << endl;
    iterativeGCD();
}