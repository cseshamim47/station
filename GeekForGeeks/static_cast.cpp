#include <iostream>
using namespace std;

int main()
{
    int x = 15, y = 2;
    double z = static_cast<double>(x)/y;
    cout << z << endl;
    double m = (double)(x)/y;
    cout << m << endl;
    
}