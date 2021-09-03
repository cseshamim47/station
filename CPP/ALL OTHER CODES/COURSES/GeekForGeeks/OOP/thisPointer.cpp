#include <bits/stdc++.h>
using namespace std;

class A{
    int x,y;
    public:
        A(int x, int y){
            this->x = x;
            this->y = y;
        }
        A &setX(int x){
            this->x = x;
            return *this;
        }
        A &setY(int y){
            this->y = y;
            return *this;
        }

        void print(){
            printf("x %d && y %d", x ,y);
        }
};

int main()
{
    A a(10,30);

    a.setX(200).setY(400);
    a.print();
    
}