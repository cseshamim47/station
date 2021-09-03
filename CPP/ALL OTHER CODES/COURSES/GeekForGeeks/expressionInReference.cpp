#include <iostream>
using namespace std;


int main()
{
    string s1 = "GFG", s2 = "Courses", s4 = "New";
    string &&s3 = s1 + s2 + s4;
    s3 = "Welcome to " + s3;
    cout << s3 << endl;     
}