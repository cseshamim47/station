// constructor , deconstructor, polymorphism(function overloading)
#include <bits/stdc++.h>
using namespace std;

class kewAsheNai{
    private:
    string name;

    public:
    kewAsheNai() // constructor
    {
        // codes
        cout << "this is a constructor!!" << endl;
    }
    kewAsheNai(string myName) //parameterized constructor
    {
        name = myName;
    }
    ~kewAsheNai() // deconstructor
    {
        // codes
        cout << "this is a de-constructor!!" << endl;
    }
    void print()
    {
        cout << name << endl;
    };
};

void f(int val)
{
    cout << "Integer : " << val << endl;
}
void f(int val,int val2)
{
    cout << "Integer : " << val << endl;
}

void f(double val)
{
    cout << "Double : " << val << endl;
}

int main()
{

    while(true)
    {
        // int arr[5]; // static array -> stack 
        int *dynamicArray = new int[3];
        delete[] dynamicArray;

    }
    int *darr = new int[3];
    darr[0] = 0;
    darr[1] = 1;
    darr[2] = 2;

    for(int i = 0; i < 3; i++) cout << darr[i] << endl;
    delete[] darr;
    darr = new int[5];
    for(int i = 0; i < 5; i++) darr[i] = i;
    for(int i = 0; i < 5; i++) cout << darr[i] << endl;
    delete[] darr;
    // f(10.5);
//    kewAsheNai obj("Md Shamim Ahmed");
//    obj.print();
//    cout << "this is a line" << endl;
//    kewAsheNai obj1;
}


// cd Tests & cls & g++ test1.cpp & a.exe