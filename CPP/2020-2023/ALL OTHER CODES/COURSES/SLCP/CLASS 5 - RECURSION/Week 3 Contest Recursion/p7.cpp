// first index of an occurance

#include <bits/stdc++.h>
using namespace std;

int firstIdx(int arr[],int i, int k)
{
    static int ai = INT_MAX;
    if(arr[i] == k) ai = min(i,ai);
    if(i == 0) return 0;
    firstIdx(arr,--i,k);
    if(ai == INT_MAX) return -1;    
    return ai;  
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
