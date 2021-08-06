//Author :   Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
 
#include <iostream>
using namespace std;
#define MAX 10000005
#define gch getchar(); 
#define cls system("cls");

int main()
{
    int arr[7] = {207,300,900,901,905,910,999};
    int high = sizeof(arr)/sizeof(arr[0]), low = 0,mid,query;
    cin >> query;

    while(low < high)
    {
        mid = (high + low)/ 2;
        
        if(arr[mid] < query) low = mid + 1;
        else high = mid;
    }

    if(arr[low] == query) cout << "value " << query << " Found at index : " << low << endl;
    else cout << "Item not found!" << endl;

}