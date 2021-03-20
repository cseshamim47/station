#include <iostream>

using namespace std;

int main()
{
    int x = 6;
    int y = 3;
    int tempVar;

    cout << "Before swapping : ";
    cout << "X = " << x << "   Y = " << y << endl;

    tempVar = x;
    x = y;
    y = tempVar;

    cout << "After swapping : ";
    cout << " X = " << x << "   Y = " << y << endl;
}

