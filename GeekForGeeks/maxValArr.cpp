#include <iostream>
#include <algorithm>
#include <vector>
using namespace std;

int main()
{
    int arr[] {3,2,5,1,2};
    int arrSize = sizeof(arr)/sizeof(arr[0]);

    int maxVal = *max_element(arr, arr+arrSize);

    cout << "Without Loop : " << maxVal << endl;

    int res = arr[0];
    
    for(int i = 0; i < arrSize; i++){
        res = max(res,arr[i]);
         
    }
    cout << res << endl;
    
    
    
}