//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define gch getchar();
int cnt;

int lowerBound(int arr[], int size, int lb){
    int l,r,m;
    l = 0; r = size;

    while(l < r){
        m = (l+r)/2;
        if(arr[m] < lb) l = m+1;  //  <= for upperBound
        else r = m;
    }
    return l;
}

int main()
{
      //        Bismillah
    int size;
    cin >> size;
    int arr[size];
    for(int i = 0; i < size; i++){
        cin >> arr[i];
    }

    int lb; cin >> lb;
    cout << "UB : " << lowerBound(arr,size,lb) << endl; // this is lowerbound
    cout << "LB : " << lowerBound(arr,size,lb+1) << endl; // this is upperbound

    // auto it = lower_bound(arr,arr+size,12);
    // cout << it - arr << endl;
}