#include <iostream>
#include <numeric>
using namespace std;

int main()
{
    int arr[] {1,2,3,4,5};
    int size = sizeof(arr)/sizeof(arr[0]);
    int x = 5;
    int sum = accumulate(arr, arr+size, x);

    cout << sum << endl;
    
}