//Write a program to prompt the user to input 3 integer values and print these values in forward and reversed order.
#include <iostream>

using namespace std;

int main()
{
    int x,y,z;
    cout << "Please enter three integer values below" << endl;
    cin >> x;
    cin >> y;
    cin >> z;
    cout << "\nForward order:    " << x << "   " << y << "   " << z << endl;
    cout << "Reversed order:   " << z << "   " << y << "   " << x << endl;

}
