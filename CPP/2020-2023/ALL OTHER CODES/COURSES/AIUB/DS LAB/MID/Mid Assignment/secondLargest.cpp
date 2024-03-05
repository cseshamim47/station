// Write a program that will return the second largest element in an array of
// unique integer values. The array size could be your choice.

//Author :   Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
 
#include <iostream>
using namespace std;

int main()
{
    int arr[5];
    int largest = INT32_MIN,secondLargest = INT32_MIN;

    for(int i = 0; i < 5; i++){
        cin >> arr[i];
        if(arr[i] > largest)
            largest = arr[i];
    }

    for(int i = 0; i < 5; i++){
        if(arr[i] == largest) arr[i] = -1;
        if(arr[i] > secondLargest) secondLargest = arr[i];
    }

    cout << secondLargest << endl;
}