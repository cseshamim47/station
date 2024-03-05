#include <iostream>
using namespace std;

void swap(int &x, int &y){
    int temp = x;
    x = y;
    y = temp;
}
int myMethod(int x, int y){
    return x;
    return y;
}
int main()
{
    int x = 10, y = 15;
    swap(x,y);
    cout << x << " " << y;
    cout << endl;
}