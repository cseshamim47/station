#include <iostream>
#include "mojo.h"
using namespace std;

int main()
{
    mojo a(20);
    mojo b(30);
    mojo c;
    c = a+b;

    cout << c.num << endl;
}
