///#include <bits/stdc++.h>
#include <iostream>
#include <iomanip>
#include <math.h>

using namespace std;

void first()
{
    cout << "What date is today?" << endl;
    int date;
    cin >> date;
    cout << "Today is " << date << " Sep" << endl;
}

void second()
{
    int value1;
    int value2;

    cout << "Enter Value one : ";
    cin >> value1;
    cout << "Enter Value two : ";
    cin >> value2;

    int sum = value1+value2;
    cout << "Sum : " << sum << endl;
}

void third()
{
    double frac1, frac2;
    cin >> frac1 >> frac2;
    double ans = frac1*frac2;
    cout << fixed << setprecision(6) << ans << endl;

    cout << frac1+frac2 << endl;
    cout << frac1-frac2 << endl;
    cout << frac1/frac2 << endl;
}

void fourth()
{
    int a = pow(2,31)-5;
    while(true)
    {
        cout << a << endl;
        a = a + 1;
        getchar();
    }
}

void fifth()
{
    int a = 5;
    double b = 10.8;
    float c = 5.6;
    char ch = 'c';

    cout << "Memory taken by int : " << sizeof(a) << " bytes" << endl;
    cout << "Memory taken by double : " << sizeof(b) << " bytes" << endl;
    cout << "Memory taken by float : " << sizeof(c) << " bytes" << endl;
    cout << "Memory taken by float : " << sizeof(ch) << " bytes" << endl;
}

void sixth()
{
    for(char ch = 'a'; ch <= 'z'; ch++)
    {
        cout << ch << " ";
    }

    string name = "Md Shamim Ahmed";
    //cin >> name; /// cannot take full name or space
    getline(cin,name); // kisu problem o ase
    cout << name << endl;
}

int main()
{
    //    first();
    // second();
     third();
    // fourth();
    // fifth();
    // sixth();

    /// camelCasing ----- PascalCasing
    /// syntax - memorize
    /// C++ - Case sensitive --- a & A are different

    int a;
    int A;

}
