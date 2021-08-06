
#include <bits/stdc++.h>
using namespace std;

struct S1{
    char c1; //  1 + 7
    double d1; // 8
    char c2; // 1 + 7
};
struct S2
{
    char c1; // 1
    char c2; // 1 
    char c3; // 1 
    char c4; // 1 
    int x; // 4
    double d1; // 8
};
struct S3
{
    double d1; // 8 
    char c1; // 1
    char c2; // 1 + 6
};


int main()
{

    cout << sizeof(S1) << ' '
         << sizeof(S2) << ' '
         << sizeof(S3) << ' ';
    
}