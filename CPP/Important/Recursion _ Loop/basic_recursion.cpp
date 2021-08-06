//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
ll cnt;

void recursion(int n){
    cout << n << endl;
    if(n<=0) return;
    recursion(n-1); 
    cout << n*n << endl;
}

int main()
{
      //        Bismillah
    recursion(4);
}