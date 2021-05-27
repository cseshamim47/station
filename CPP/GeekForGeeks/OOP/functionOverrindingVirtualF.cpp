#include <bits/stdc++.h>
using namespace std;
class base{
    public:
    virtual void print(){printf("base\n");}
};

class derived:public base{
    public: 
    void print() override {printf("derived\n");}
};

int main()
{
    base b;
    derived d;
    b.print();
    d.print();

    base *ptr = &d;
    ptr->print();   
}