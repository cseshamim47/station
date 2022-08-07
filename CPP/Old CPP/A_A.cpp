//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
ll cnt;

int main()
{
    double w,b;
    cin >> w >> b;
    b -= 0.5;
    cout << setprecision(2) << fixed;
    if((int)w % 5 == 0 && w<=b)
    {
        cout << b-w << "\n";
    }
    else
        cout << b+0.5 << "\n";
    
}