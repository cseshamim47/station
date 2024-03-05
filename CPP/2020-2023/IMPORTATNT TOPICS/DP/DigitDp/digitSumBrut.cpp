#include <bits/stdc++.h>
using namespace std;


int f(int n)
{
    if(n == 0) return 0;

    int sum  = 0;
    sum += n%10 + f(n/10);
    return sum;
}

int main()
{
    //    Bismillah
    int l,n;
    cin >> l >> n;

    int sum = 0;
    for(int i = l; i <= n; i++)
    {
        sum += f(i);
    }
    cout << sum << endl;
}