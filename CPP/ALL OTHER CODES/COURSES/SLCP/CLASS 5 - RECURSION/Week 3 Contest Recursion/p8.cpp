//  last index of an occurance

#include <bits/stdc++.h>
using namespace std;

int firstIdx(int arr[],int i, int k)
{
    if(arr[i] == k) return i; 
    if(i == 0) return -1;
    return firstIdx(arr,--i,k); 
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
    int k;
    cin >> k;
    cout << firstIdx(arr,n-1,k) << endl;
}
// 7
// 0 1 2 1 4 1 7 
// 1
