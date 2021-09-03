// sum of array

#include <bits/stdc++.h>
using namespace std;

int sum(int arr[],int i)
{
    if(i == 0) return arr[0];
    return arr[i] + sum(arr,i-1);
}

int main()
{
    //    Bismillah
    int n;
    cin >> n;
    int arr[n];
    for(int i = 0; i < n; i++) cin >> arr[i];
    cout << sum(arr,n-1) << endl;
}