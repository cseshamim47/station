#include <iostream>

using namespace std;

int main()
{
    int x;
    cout << "Please enter a value : ";
    cin >> x;
    x = x%2;
    cout << "x = " << x << endl;
    cout <<"If x = 0, it is a even number" << endl;
    cout <<"If x = 1, it is a odd number" << endl;
}


