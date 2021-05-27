#include <bits/stdc++.h>
using namespace std;

class base{};
class derived:public base{};

int main()
{
    base *b = new derived;

    derived d;
    base &b = d;  
}