#include <iostream>
using namespace std;

void print(int *p)
{
    p = p + 1; /// change the local p not the main p
}
int size(int *a, int s)
{
    return sizeof(a); // returning size of pointer : 8
}

int sum(int a[], int s) // a[] is part of an array
{
    int tmp = 0;
    for(int i = 0; i < s; i++)
        tmp += a[i];
    return tmp;
}
int main()
{
    int n = 10;
    int *p = &n;
    // cout << p << endl;
    // print(p);
    // cout << p << endl;
    int arr[10] {1,1,1,1,1,1,1,1,1,10};
    // cout << sizeof(arr) << endl;
    // cout << size(arr, 10) << endl;
    cout << sum(arr+5,5) << endl;

}