#include <iostream>
using namespace std;


int main()
{
    int a[] = {1,8,3};
    int *p1 = a;
    int (*p2)[3] = &a;
    cout << *p1 << ' ' <<  (*p2)[2] << endl;
    cout << *p2 << endl;

}