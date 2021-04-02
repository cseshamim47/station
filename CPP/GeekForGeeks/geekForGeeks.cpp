#include <iostream>
using namespace std;

void f(int x){
    cout << "Integer" << endl;
}
void f2(int *ptr){
    cout << "pointer" << endl;
}

int main()
{
    
    f(0);
    f2(nullptr);
    
}