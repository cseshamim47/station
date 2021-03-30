#include <iostream>
// #include <string>
using namespace std;

int main()
{
    string s = "abcd";
    string n = "";
    int size = s.length()-1;
    while(size>=0){
        n += s[size];
        size--;
    }
    cout << n << endl;

    
}