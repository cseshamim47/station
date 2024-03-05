#include <bits/stdc++.h>
using namespace std;

#define int long long

int fibNormal(int n) // TC : O(2^n), SC : O(2^n) + O(2^n)
{
    if(n <= 1) return n;
    return fibNormal(n-1) + fibNormal(n-2);
}


int fibMemoization(int n,vector<int> &mem) // TC : O(n), SC : O(n) + O(n)
{
    if(n <= 1) return n;
    if(mem[n] >= 0) return mem[n];
    return mem[n] = fibNormal(n-1) + fibNormal(n-2);
}

int fibBottomUp(int n) // TC : O(n), SC : O(n)
{
    vector<int> fib(n+1,0);
    fib[0] = 0;
    fib[1] = 1;
    for(int i = 2; i <= n; i++)
    {
        fib[i] = fib[i-1] + fib[i-2];
    }
    return fib[n];
}
int fib3variable(int n) // TC : O(n), SC : O(1)
{
    int prev2 = 0;
    int prev = 1;
    int curi = 0;
    for(int i = 2; i <= n; i++)
    {
        curi = prev2 + prev;
        prev2 = prev;
        prev = curi;
        // cout << curi << endl;
    }
    return curi;
}


int32_t main()
{
    int n = 5;
    vector<int> mem(n+1,-1);
    // cout << fibNormal(n) << endl;    
    // cout << fibMemoization(n,mem) << endl;  
    cout << fibBottomUp(n) << endl;   
    // cout << fib3variable(n) << endl;   
}