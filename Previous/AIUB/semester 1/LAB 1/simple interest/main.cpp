#include <iostream>

using namespace std;

int main()
{
    int P = 4000;
    int T = 2;
    float R = 5.5;
    int I = float(P*T*R)/100;
    cout << "Interest is : " << I << endl;
}
