#include <bits/stdc++.h>
using namespace std;

int main()
{
    cout << fixed << setprecision(5);

    double a, b, c, temp = 0,r1,r2;
    cin >> a >> b >> c;
    temp = b*b - 4*a*c;

    r1 = (-b + sqrt(temp))/ (2*a);
    r2 = (-b - sqrt(temp))/ (2*a);
    if(temp <= 0 || a == 0){
       cout << "Impossivel calcular" << endl;  
    }else{
        cout << "R1 = " << r1 << endl;
        cout << "R2 = " << r2 << endl;
    }
    
    
}