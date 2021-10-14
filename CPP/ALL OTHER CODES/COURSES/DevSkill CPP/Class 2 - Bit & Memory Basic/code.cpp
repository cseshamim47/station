#include <bits/stdc++.h>
using namespace std;

int main()
{
    /**
      short int -> 2 Byte -> 16 bit -> [-2^15 ~ 2^15 - 1] -> [-32768, 32767]
    **/
    int a = 1 << 3; // 2^3
    cout << a << endl;

    short int var;
    var = 1000000000000LL;
    int d;
    while(cin >> d)
    {
        var += d;
        cout << "new value : " << var << endl;
    }
    
    
}