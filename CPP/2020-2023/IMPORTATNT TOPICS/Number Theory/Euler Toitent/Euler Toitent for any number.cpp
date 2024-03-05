#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n;
    cin >> n;

    int res = n;
    for(int p = 2; p*p <= n; p++)
    {
        if(n%p == 0)
        {
            res /= p;
            res *= (p-1); 
            while(n%p == 0)
            {
                n/=p;
            }
        }
    }
    if(n > 1)
    {
        res /= n;
        res *= (n-1);
    }

    cout << res << endl;

}