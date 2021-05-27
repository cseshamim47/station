#include <bits/stdc++.h>
using namespace std;

class A{
    int *ptr;
    public:
        A(int a){
            ptr = new int(a);
        }
        A(const A &a){
            int val = *(a.ptr);
            ptr = new int(val);
        }
        void set(int a){
            *ptr = a;
        }
        void print(char a[]){
            printf("%s ptr is locating to : %d\n", a, *ptr);
        }
};

int main()
{
    char o[] = "one";
    char t[] = "two";
    A one(20);
    one.print(o);
    A two = one; // A two(one); // also valid
    two.print(t);
    two.set(199);
    one.print(o);
    two.print(t);
}