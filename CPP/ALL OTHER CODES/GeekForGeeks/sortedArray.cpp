#include <iostream>
using namespace std;
bool isItSorted(int arr[],int n);
int main()
{
    int n;
    cin >> n;
    int arr[n];
    for(int i = 0; i < n; i++){
        cin >> arr[i];
    }

    if(isItSorted(arr,n)) cout << "Sorted" << endl;
    else cout << "Not Sorted" << endl;
    
}

bool isItSorted(int arr[],int n){
    for(int i = 1; i < n; i++){
        if(arr[i]<arr[i-1]) return false;
    }
    return true;
}