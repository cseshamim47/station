#include <bits/stdc++.h>
using namespace std;

int nCr(int n, int r)
{
    if(n==r) return 1;
    else if(r==1) return n;
    int a = nCr(n-1,r-1); // 
    int b = nCr(n-1,r); 
    return a+b;
}


int main()
{
    //    Bismillah
    cout << nCr(4,2) << endl;
}