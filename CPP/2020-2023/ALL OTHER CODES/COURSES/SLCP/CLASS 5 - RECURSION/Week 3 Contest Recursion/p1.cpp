// Write a program to find x to the power n (i.e. x^n). Take x and n from the user. You need to return the answer.
// Do this recursively.


#include <bits/stdc++.h>
using namespace std;

#define ll long long

ll power(ll x,ll n)
{
    if(n == 0) return 1;
    ll p = power(x,n-1);
    return x * p;
}

int main()
{
    //    Bismillah
    ll n,k;
    cin >> n >> k;
    cout << power(n,k) << endl;
}