#include <bits/stdc++.h>
using namespace std;

int gcd(int a, int b) // O(logN)
{
    if(!b) return a;
    return gcd(b,a%b);
}

int main()
{
    int n;
    cin >> n;
    int ans = 0;
    for(int i = 1; i <= n; i++) // O(NlogN)
    {
        if(gcd(i,n) == 1) ans++;
    }    
    cout << ans << endl;
}