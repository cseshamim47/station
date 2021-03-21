#include <iostream>
using namespace std;

int main()
{
    int y = 10;

    int &tonmoy = y;

    y = 15;
    cout << tonmoy << endl;
    tonmoy = 200;
    cout << y << endl;
    
}