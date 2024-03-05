#include <bits/stdc++.h>
using namespace std;

void rotate(int* arr, int n, int d)
{
    d %= n;
    reverse(arr,arr+d);
    reverse(arr+d,arr+n);
    reverse(arr,arr+n);
}

int main()
{
    //    Bismillah
    int n = 10;
    int arr[n] = {1,2,3,4,5,6,7,8,9,10};
    int d = 14;
    rotate(arr,n,d);

    for(auto x : arr) cout << x << " ";
}