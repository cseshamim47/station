#include <iostream>
using namespace std;

int main()
{
    int i = 65;
    char c = i;
    cout << c << endl;

    int* p = &i;
    char* cp = (char*)p; // typecast
    cout << cp << endl;  // A
    cout << *cp << endl; // A
    
    cout << *(cp+2) << endl; // null char
    cout << *(cp+3) << endl; // null char

    // similarly
    char cx = 'A';
    char* pcx = &cx;
    int* pix = (int*)pcx;
    cout << *pix << endl; // garbage
}