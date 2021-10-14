#include <bits/stdc++.h>
using namespace std;

void Merge(int* larr, int* rarr, int ls,int rs, int* arr)
{
    int i,j,k;
    i = j = k = 0;

    while(i < ls && j < rs)
    {
        if(larr[i] < rarr[j])
        {
            arr[k++] = larr[i++];
        }
        else
        {
            arr[k++] = rarr[j++];
        }
    }

    while(i < ls) arr[k++] = larr[i++];
    while(j < rs) arr[k++] = rarr[j++];
}

void mergeSort(int arr[],int n)
{
    if(n < 2) return;
    else
    {
        int mid = n/2;
        int left = mid;
        int right = n-mid;
        int larr[left];
        for(int i = 0; i < left; i++)
        {
            larr[i] = arr[i];
        }
        int rarr[right];
        for(int i = mid; i < n; i++)
        {
            rarr[i-mid] = arr[i];
        }
        mergeSort(larr,left);
        mergeSort(rarr,right);
        Merge(larr,rarr,left,right,arr);
    }
}

int main()
{
    int n = 7;
    int arr[] = {3,1,5,8,4,2,9};
    for(auto x : arr) cout << x << " ";
    cout << endl;    
    mergeSort(arr,n);    
    for(auto x : arr) cout << x << " ";
}