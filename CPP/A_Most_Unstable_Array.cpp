//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;


void solve()
{
    int n , b;
    cin >> n >> b;
    if(n >= 3)
    {
        cout << b*2 << "\n";
        return;
    }
    if(n == 2)
    {
        cout << b << "\n";
        return;
    }
    if(n == 1)
    {
        cout << 0 << "\n";
    } 
}

int main()
{
    int t;   cin >> t;   w(t);
}