//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 500015
#define ll unsigned long long
#define w(t) while(t--){ solve(); }
ll cnt;
ll arr[MAX];

void solve()
{
    ll n;
    cin >> n;
    n/=2;
    ll ans = n*(n+1)*(2*n+1)/6;
    cout << ans*8 << "\n";
}

int main()
{
    //        Bismillah
    int t; cin >> t; w(t);
}