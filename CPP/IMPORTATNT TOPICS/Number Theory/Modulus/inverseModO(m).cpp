#include <bits/stdc++.h>
using namespace std;

int main()
{
    /* 
        from Fermat's little theorem

            a^m-1 = 1 (mod m)  ----> m must be prime and a is co-prime 
                                 with m
        ->  a^m-2 . a = 1 (mod m)
        ->  a^m-2 = 1/a (mod m)

        ->  4^7-1 = 1 (mod 7)
        ->  4^5 . 4 = 1 (mod 7)
        ->  4^5 mod 7 = 1/4 (mod 7)
    */    

    int a = 4;
    int m = 7;
    int p = m-2;
    int ans = 1;

    cout << ((int)pow(a,p)%m) << endl; // O(m)


    for(int i = 1; i <= m-2; i++)
    {
        ans = ((ans % m) * (a % m)) % m; 
    }
    cout << ans << endl;


}