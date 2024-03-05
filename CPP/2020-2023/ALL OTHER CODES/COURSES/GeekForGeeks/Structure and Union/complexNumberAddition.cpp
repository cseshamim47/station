#include <bits/stdc++.h>
using namespace std;

struct Complex
{
    int real, imaginary;
};

int main()
{
    Complex a, b, c;
    cin >> a.real >> a.imaginary >> b.real >> b.imaginary;
    c.real = a.real + b.real;
    c.imaginary = a.imaginary + b.imaginary;

    cout << c.real << " + " << c.imaginary << "i" << endl;
    
}