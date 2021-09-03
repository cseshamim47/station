#include <iostream>
using namespace std;

int main()
{
    //binary operators
    {
        int x = 20, y = 10;
        cout << (x+y) << "\n"
             << (x-y) << "\n"
             << (x%y) << "\n"
             << (x*y) << "\n";
    }
    //unary operators
    {
        int x = 10;
        int y = x++;
        int z = ++x;
        cout << x << "\n"
             << y << "\n"
             << z;
    }
    
}