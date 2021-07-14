//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;

#define MAX 10000005
#define gch getchar();

int cnt;

// O(n+k);
void countingSort(int *arr,int n, int k){
    int karr[k] = {0};
    for(int i = 0; i < n; i++){
        ++karr[arr[i]];
    }
    for(int i = 1; i < k ; i++){
        karr[i] += karr[i-1];
    }
    int ans[n];
    for(int i = n-1; i>=0; i--){
        ans[--karr[arr[i]]] = arr[i];
    }
    for(int i = 0; i < n; i++) arr[i] = ans[i]; 
}

// O(n+max);
void countingNegativeSort(int *arr,int n, int min, int max){
    min *= -1;
    max += min;
    int karr[max] = {0};
    for(int i = 0; i < n; i++){
        arr[i]+=min;
    }
    for(int i = 0; i < n; i++){
        ++karr[arr[i]];
    }
    for(int i = 1; i < max ; i++){
        karr[i] += karr[i-1];
    }
    int ans[n];
    for(int i = n-1; i>=0; i--){
        ans[--karr[arr[i]]] = arr[i];
    }
    for(int i = 0; i < n; i++) arr[i] = ans[i]-min; 
} 


int main()
{
    int n,m,k;
    cin >> n >> m >> k;
    k++;
    int arr[n];

    for(int i = 0; i < n; i++){
        cin >> arr[i];
        cout << arr[i] << " ";
    }
    cout << endl << "-----------------" << endl;
    // countingSort(arr,n,k);
    countingNegativeSort(arr,n,m,k);

    for(auto &x : arr) cout << x << " ";

}