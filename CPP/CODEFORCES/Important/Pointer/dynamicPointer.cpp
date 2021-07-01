#include <bits/stdc++.h>
using namespace std;
int* dp(){
    int *ptr = new int[10];
    return ptr;
}
int main()
{
    int *ptr = dp();

    *ptr = 10;
    *(ptr+1) = 20;
    delete ptr;

    cout << *ptr << endl;
    cout << ptr[1] << endl;
    
    
}