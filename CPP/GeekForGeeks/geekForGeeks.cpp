#include <iostream>
using namespace std;

int main()
{
    int x;
    cin >> x;
    cout << "1 1 ";
    int a = 1, b = 1, c = 0;
    for(int i = 2; i<=x; i++){
        c = a+b;
        cout << c << " ";
        a = b;
        b = c;
        
    }
    // cout << c << endl;
    
}