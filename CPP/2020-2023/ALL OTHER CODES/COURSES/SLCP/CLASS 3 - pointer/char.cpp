
#include <iostream>
using namespace std;

int main()
{
    char ch[] = "abcd"; 
    char* ptr = ch;
    cout << ptr << endl;
    cout << ch << endl; // op : abcd
    // char* ch1 = "abcd"; // never do
    // cout << ch1 << endl; // never do
    char c = 'a';
    cout << c << endl; // op : a
    char* cp = &c;
    cout << cp << endl; // op : a?lad ( garbage )

    cout << *cp << endl; // this works fine
}