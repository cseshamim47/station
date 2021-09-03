#include <iostream>
using namespace std;

int &fun(){
    static int x = 10;
    return x;
}

int main()
{
    int &y = fun();
    y = 20;
    cout << fun();
    return 0;
    
}