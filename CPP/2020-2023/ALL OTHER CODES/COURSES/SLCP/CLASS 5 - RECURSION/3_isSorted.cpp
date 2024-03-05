#include <bits/stdc++.h>
using namespace std;

bool isSorted(int arr[],int size)
{
    if(size == 0 || size == 1) return true;
    if(arr[0] > arr[1]) return false;

    bool isSmallerSorted = isSorted(arr+1,size-1);

    if(!isSmallerSorted) return false;
    else return true;
}

bool isSorted2(int arr[],int size)
{
    if(size == 0 || size == 1) return true;

    bool isSmallerSorted = isSorted(arr+1,size-1);

    if(!isSmallerSorted) return false;

    if(arr[0] > arr[1]) return false;
    else return true;
    
}

int main()
{
    //    Bismillah
    int n;
    cin >> n;
    int arr[n];
    for(int i = 0; i < n; i++){
        cin >> arr[i];
    }
    if(isSorted2(arr,n-1)) cout << "SORTED" << endl;
    else cout << "NOT SORTED" << endl;
}