#include <iostream>
using namespace std;

void bin(unsigned n)
{
    unsigned i;
    for (i = (1 << 31); i > 0; i = i / 2)
        (n & i) ? printf("1") : printf("0");
}
 
int main()
{
    unsigned m = (1<<31);
    // m = m/58;
    // cout << m << endl;
    // cout << (m & 4) << endl;
    // cout << (m & 4) << endl;
    bin(4);
    cout << "\n";
    bin(37025580);
}