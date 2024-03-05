#include <bits/stdc++.h>
using namespace std;


int bigPower(int base,int power){
    int res = 1;
    while(power)
    {
        if(power%2 != 0)
        {
            res *= base;
            power--;
        }else 
        {
            power/=2;
            base *= base;
        }

    }
    return res;
}


int main()
{
    //    Bismillah
    int base,power;
    cin >> base >> power;

    cout << bigPower(base,power) << endl;
}