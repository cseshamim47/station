#include <bits/stdc++.h>
using namespace std;

int f(int* arr, int key)
{
    int l = 0; 
    int r = 9;
    while(l <= r)
    {
        int m1 = l+(r-l)/3;
        int m2 = r-(r-l)/3;
        if(arr[m1] == key)
        {
            return arr[m1];
        }else if(arr[m2] == key)
        {
            return arr[m2];
        }else if(arr[m1] < key && arr[m2] > key)
        {
            l = m1+1;
            r = m2-1;
        }else if(arr[m1] > key)
        {
            r = m1-1;
        }else if(arr[m2] < key)
        {
            l = m2+1;
        }
    }
    return -1;
}

int main()
{
    // int arr[10] = {1,2,4,8,15,19,24,25,27,30};  
    int arr[10] = {1,2,4,8,15,19,24,25,27,30};  

    for(int i = 0; i < 10; i++)
    {
        cout << arr[i] << " - > " << f(arr,arr[i]) << endl;
    }
}