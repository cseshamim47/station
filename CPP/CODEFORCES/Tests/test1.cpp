#include <bits/stdc++.h>
using namespace std;
int main()
{

    double a, b, c, d, e;
    double arr[3];
    for (int i = 0; i < 3; i++)
    {
        cin >> arr[i];
    }
    sort(arr, arr + 3);

    a = arr[0];
    b = arr[1];
    c = arr[2];
    //cout<<a<<" "<<b<<" "<<c;
    if (0 < a && 0 < b && 0 < c)
    {
        if (c >= (b + a))
        {
            cout << "NAO FORMA TRIANGULO\n";
        }

        if (c > b+a && (c * c) == (b * b + a * a))
        {
            cout << "TRIANGULO RETANGULO\n";
        }

        if (c > b+a && (c * c) > (b * b) + (a * a))
        {
            cout << "TRIANGULO OBTUSANGULO\n";
        }

        if (c > b+a && (c * c) < (b * b) + (a * a))
        {
            cout << "TRIANGULO ACUTANGULO\n";
        }

        if (c > b+a && a == b && b == c && c == a)
        {
            cout << "TRIANGULO EQUILATERO\n";
        }

        if (a == b && a != c)
        {
            cout << "TRIANGULO ISOSCELES\n";
        }
        if (b == c && a != c)
        {
            cout << "TRIANGULO ISOSCELES\n";
        }
        if (a == c && a != b)
        {
            cout << "TRIANGULO ISOSCELES\n";
        }
    }

    return 0;
}