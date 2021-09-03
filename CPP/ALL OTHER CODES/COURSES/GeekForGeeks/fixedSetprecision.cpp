#include <iostream>
#include <iomanip>
using namespace std;

int main()
{
    {
    cout << '\n' << '\n';   
    double x = 1.23, y = 11224456.453;
    cout << std::fixed;
    cout << x << "\n"
         << y << "\n";
    cout << std::setprecision(2);
    cout << x << "\n"
         << y << "\n";
    double z = 1.2e+7;
    cout << z;

    }
    
}