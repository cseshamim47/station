#include <iostream>
#include <iomanip>
using namespace std;

int main()
{
    cout << setprecision(4);
    double x = 15.5683, y = 34267.1;
    cout << x << ' ' << y << ' ' << "\n";
    double z = 1.23;
    double n = 10;
    cout << showpoint << n << '\n';
    cout << showpos << z << '\n';
    cout << uppercase << y << '\n';

    
}