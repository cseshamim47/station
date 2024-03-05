#include <bits/stdc++.h>
using namespace std;

class Marks{
    int intmark;
    int extmark;
    public:
        Marks(){
            intmark = 0;
            extmark = 0;
        }
        Marks(int im, int em){
            intmark = im;
            extmark = em;
        }
        void display(){
            cout << intmark << " " << extmark << endl;
        }

        Marks operator+(Marks second){
            Marks tmp;
            tmp.intmark = intmark + second.intmark;
            tmp.extmark = extmark + second.extmark;
            return tmp;
        }

        Marks operator-(Marks second);
};

Marks Marks::operator-(Marks second){
    Marks tmp;
    tmp.intmark = intmark - second.intmark;
    tmp.extmark = extmark - second.extmark;
    return tmp;
}

int main()
{
    Marks m1(10,20), m2(30,40),m3,m4;
    m3 = m1 + m2;
    m4 = m3 - m1;
    m3.display();
    m4.display();
}