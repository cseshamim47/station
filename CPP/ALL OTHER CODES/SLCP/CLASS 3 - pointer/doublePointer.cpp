#include <iostream>
using namespace std;

void f(int** p)
{
    p = p + 1;
}

void f3(int** p)
{
    (**p)++;
}

void f2(int** p)
{
    *p = *p + 1;
}
int main()
{
    int var = 10;
    int *p = &var;
    int** p2 = &p;

    cout << p2 << endl; // address : p
    cout << &p << endl; // address : p

    cout << p << endl;      // address : var
    cout << *p2 << endl;   // address : var 
    cout << &var << endl; // address : var

    cout << *p << endl; // 10
    cout << **p2 << endl; // 10

    cout << p2 << endl; // address : p
    f(p2);
    cout << p2 << endl;// unchanged address : p

    f3(p2);
    cout << var << endl; // var changed
    
    cout << p << endl; // address : p
    f2(p2);
    cout << p << endl; // address : p changed

}