#include <bits/stdc++.h>
using namespace std;

/*
Class 11 :

More about recursion :: nth factorial, reverse a string, check palindrome
STL : next permutation, prev premutation
C++ Class 2
scope resolution operator
static variable
Problem Solving : 

1. In statistics, the mode of a group of numbers is the one that occurs the most often.
For example : 100,2,19,23,1,2,3,4,5,6,4,8,4,8,10,12. Here, the mode is 4. Because it occurs 3 times. 
Write e progam that allows users to enter a list of 20 numbers and then finds and displays
the mode.

2. Write a progam that repeteadly reads strings from the keyboard until the users enters "quit".

3. Write a program that acts like an electronic dictonary. If the user enters a word in the 
dictionary, the program display its meaning. 

*/

class Calculator{
    // private:

    public:
    int sum;
    // int mul;

    void add(int x, int y);

    void print()
    {
        cout << "Sum : " <<  sum << endl;
    }
};

// scope resulotion operator -> ::

void Calculator::add(int x, int y)
{
    sum = x + y;
}

void print(int n)
{
    if(n < 5) print(n+1);
    cout << n << " ";
}

int x=10; // global

void f()
{
    int a =  10;
    static int s = 5;
    a++;
    s++;
    cout << "normal : " << a << endl;
    cout << "static : " << s << endl;
}

int main()
{
    //    Bismillah

    static int v = 5;

    while(--v)
    {
        cout << v << endl;
        main();
        cout << "->" << v << endl;
        // getchar();
    }
    // f();
    // f();
    
    return 0;


    int x = 5;
    cout << ::x << endl;


    Calculator basic,another;
    basic.add(5,10);
    basic.print();


    string str = "bac";
    sort(str.begin(),str.end());

    do
    {
        cout << str << endl;
    }while(next_permutation(str.begin(),str.end()));

    cout << str << endl;

    // print(1);
    // print(2);
    // print(3);
}

// cd Tests & cls & g++ test1.cpp & a.exe