#include <iostream>
#include <vector>
using namespace std;

double average(int *arr, int n){ // (int arr[], int n) same
    int sum = 0; 

    for(int i = 0; i < n; i++){
        sum += *(arr+i);
    }
    return sum/double(n);
}

int main()
{
    int n;
    cin >> n;

    int arr[n];
    for(int i = 0; i < n; i++){
        cin >> arr[i];
    }
    cout << average(arr,n);
}