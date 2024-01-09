#include <bits/stdc++.h>
using namespace std;
/* 
Class 12 :
Recursion
Default Value in parameter
Math functions
C++ Class 3
Problem Solving :  

1. Given an expression, you need to find the count of variable names and output them. 
For example : 
input : ans=x1+60+y1-90
output :
variable count:  3 
variable 1 : ans 
varibale 2 : x1
variable 3 : y1

2. frequency count
*/

class calculator{
    private:
    int sum;

    public:

    void add(int a,int b, int c = 0)
    {
        sum = a+b+c;
    } 
};

class Person{
    private:
    string name;
    int age;
    // string phone;

    public:
    
    void SetName(string myName)
    {
        name = myName;
    }
    string GetName()
    {
        return name;
    }
};

#define sq(x) ((x)*(x))

void frequency()
{
    int n = 10;
    int arr[n] = {1,2,3,1,3,3,8,4,6,8};

    map<string,string> dictonary;
    dictonary["Math"] = "Gonit";
    dictonary["Sweet"] = "Mishti";

    cout << dictonary["Math"] << endl;


    // map<int,int> mp;

    // for(int i = 0; i < n; i++)
    // {
    //     mp[arr[i]]++;
    // }

    // for(auto x : mp)
    // {
    //     cout << x.first << " : " << x.second << endl;
    // }

    // int freq[n+1]{0};
    // for(int i = 0; i < n; i++)
    // {
    //     freq[arr[i]]++;
    // }

    // for(int i = 1; i <= n; i++)
    // {
    //     if(freq[i] != 0)
    //     {
    //         cout << i << " : " << freq[i] << endl;
    //     }
    // }

    // for(int i = 0; i < n; i++)
    // {
    //     int count = 0;
    //     for(int j = 0; j < n; j++)
    //     {
    //         if(arr[i] == arr[j]) count++;
    //     }
    //     cout << count << endl;
    // }
    // cout << endl;
}


int main()
{
    //    Bismillah

    frequency();
    return 0;

    Person p1;
    p1.SetName("Taiyaba");
    cout << p1.GetName() << endl;

    calculator c1;
    // c1.x = 1000;
    c1.add(1,2,3);
    c1.add(1,2);
    
    int n = sqrt(36);
    cout << n << endl;
    cout << sq(n) << endl;
    cout << pow(2,4) << endl; // powl(base,power)   
    cout << log2(16) << endl;
    cout << log10(1000) << endl;

    string str = "Apple";
    cout << str.substr(1,3) << endl;

    
}

// cd Tests & cls & g++ test1.cpp & a.exe