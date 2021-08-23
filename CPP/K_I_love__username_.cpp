#include <iostream>
#include <limits.h>
using namespace std;

int main()
{
    int x;
    cin >> x;
    int arr[x];
    cin >> arr[0];
    int max = arr[0];
    int min = arr[0];
    int count = 0;
    for(int i = 1; i < x; i++)
    {
        cin >> arr[i]; 
        if(max<arr[i]){max = arr[i]; count++;} 
        if(min>arr[i]){min = arr[i]; count++;} 
    }
    if(x==1){
        count = 0;
    }
    // cout << max << endl;
    cout << count << endl;
}