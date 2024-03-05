#include <bits/stdc++.h>
using namespace std;

int gcd(int a, int b)
{
    if(!b) return a;
    return gcd(b,a%b);
}

int main()
{
    printf("%d \n", gcd(60,36));  
}