//Author :   Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
 
#include <iostream>
using namespace std;

int main()
{
    int arr[7] = {207,300,900,901,905,910,999};
    int high = 6, low = 0,mid,query;
    cout << "Binary search : ";
    cin >> query;

    while(low <= high)
    {
        mid = (high + low) / 2;

        if(arr[high] == query){
        cout << "Found at index : " << high << endl;
            return 0;
        }else if(arr[low] == query){
            cout << "Found at index : " << low << endl;
            return 0;
        }else if(arr[mid] == query){
            cout << "Found at index : " << mid << endl;
            return 0;
        }
        if(arr[mid] < query) low = mid + 1;
        else if(arr[mid] > query) high = mid - 1;
    }

    cout << "Item not found!" << endl;


}