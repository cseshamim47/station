/// pointer, typecasting, structure

#include <bits/stdc++.h>
using namespace std;

#define STOP getchar();

struct info
{
    // member, field, elements   
    string name;
    int roll;
}a,b;


int main()
{
    {
        // int a,b,c[5];
        info c;
        a.name = "Tonmoy Dey";
        a.roll = 1;

        b.name = "Rabbi Hossen";
        b.roll = 2;
        c = a;
        cout << a.name << " " << a.roll << endl;
        cout << b.name << " " << b.roll << endl;
        cout << c.name << " " << c.roll << endl;


    }

    {
        int a = 10;
        int *p = &a;

        *p = 100;

        // p = p + 10; // ++, --, + -

        cout << *p << endl;
        cout << &(*p) << endl;
        cout << ++(*p) << endl;
        cout << *p++ << endl;
        // cout << (*p)++ << endl;
        cout << &(*p) << endl;
        int arr[] { 1,2,3,4,5 };

        // arr = arr + 100; not allowed
        cout << p << endl;
        cout << arr << endl;
        cout << &arr << endl;


        cout << arr[3] << endl;
        cout << arr[3] << endl;
        cout << *(arr + 3)<< endl;
        cout << sizeof(arr) << endl;

    }

    STOP
    STOP

    {
        // 1. implicit typecasting-> bool -> char -> short -> int -> long long (data loss)
        // 2. explicit typecasting
        /// implicit
        int x = 10;
        // byte bt = (int)x;
        double dp = 15.6;
        char ch = (char)dp;

        cout << ch << endl;
        char y = 'a';
        x = x + y;
        cout << x << endl;
        float z = x + 1.5;
        double xx = 1.4;
        int sum = xx + 1;

        /// explicit

        double dd = 1.5;
        int it = 8;
        // dd = (double)it;
        // dd = double(it);
        dd = static_cast<double>(it);

        cout << dd << endl;
    }

    

    {
        int *p;
        double a = 10;
        // p = &a;
    }

    {
        int *ip;
        double *dp;
        char *cp;
        cout << sizeof(ip) << endl;
        cout << sizeof(dp) << endl;
        cout << sizeof(cp) << endl;
    }   
    
    {
        // char *c = "Tonmoy Dey"; /// not recommended approach /// const 
        char name[] = "Tonmoy";
        string str = name;
        // cout << sizeof(c) << endl;
        cout << sizeof(name) << endl;
        name[2] = 'o';
        // c[2] = 'o'; // we cannot do this as c value is a constant
        // cin >> name;
        cout << name << endl;
        cout << sizeof(name) << endl;
    }


    {
        // int *xy = 5; not possible 
        int c = 5; /// 0x61fe14
        int* b = &c; /// (0x61fe14 address of c) (0x61fe08 address of b)
        int **a = &b; /// (0x61fe08 address of b) (0x61fe08 address of a)

        cout << &c << endl;
        cout << b << endl;
        cout << &b << endl;
        cout << a << endl;
        cout << "Location of a : " << &a << endl;

        cout << *b << endl;
        cout << "Location of c : " << *a << endl; /// 
        cout << **a << endl;

        int ***tp;
        tp = &a;
        cout << tp << endl;
    }


    { 
        int a = 10;
        int *p;
        p = &a;

        cout << &a << endl; // address of a
        cout << p << endl; // location of a
        cout << &p << endl; /// location of p
        cout << a << endl; // acutal value
        *p = 65; // modification
        cout << *p << endl; // dereferencing
        cout << a << endl; 
        cout << &(*p) << endl; /// same of &a
    }


}