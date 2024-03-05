#include <bits/stdc++.h>
using namespace std;

class Mark{
    int mark;
    public:
    Mark(){mark = 0;}
    Mark(int mark){
        this->mark = mark;
    }

    void print(){
        cout << mark << endl;
    }

    void operator+=(int bonusMark){
        mark = mark + bonusMark;
    }
    
    friend void operator-=(Mark &obj,int bonusMark);
};

void operator-=(Mark &obj,int bonusMark){
    obj.mark -= bonusMark;
}

int main()
{
    Mark m(45);
    m.print();

    m += 10;
    m.print();

    m -= 10;
    m.print();
    
}