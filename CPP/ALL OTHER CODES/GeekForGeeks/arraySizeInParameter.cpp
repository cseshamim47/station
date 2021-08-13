#include <iostream>
using namespace std;

void f(int *n){
    for(int i = 0; i < sizeof(n)/sizeof(n[0]); i++){
        cout << *(n+i) << " ";
    }
    cout << endl;
}
void f(int *n, int size){
    for(int i = 0; i < size; i++){
        cout << *(n+i) << " ";
    }
    cout << endl;

}

int main()
{
    int n[] = {3,2,5,1,2};    
    int size = sizeof(n)/sizeof(n[0]);
    f(n, size);
    cout << endl;
    f(n);
    
}