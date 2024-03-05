#include <iostream>
using namespace std;

void f(int x){
    cout << "Integer" << endl;
}
void f2(int *ptr){
    cout << "pointer" << endl;
}

void nullInit(){
    int *p = NULL;
    int can;

    cin >> can;
    if(can%2==1){
        p = new int(1);
    }
    if(p!=NULL){
        cout << *p << '\n';
    }
}

int main()
{
    
    f(0);
    f2(nullptr);

    nullInit();
    
}