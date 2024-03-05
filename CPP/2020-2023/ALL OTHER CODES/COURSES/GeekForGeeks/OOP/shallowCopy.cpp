#include <bits/stdc++.h>
using namespace std;

class A{
    int *ptr;
    public:
        A(int a){
            ptr = new int(a);
        }
        void set(int a){
            *ptr = a;
        }
        void print(){
            printf("ptr is locating to : %d\n", *ptr);
        }
};

int main()
{
    A one(20);
    one.print();
    A two = one; // A two(one); // also valid
    two.set(199);

    one.print();
    two.print();
    
}