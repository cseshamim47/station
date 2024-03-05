#include <bits/stdc++.h>
using namespace std;

int kadanes_algo(int* arr, int size)
{
    int curMax = 0, bestMax = 0;
    for(int i = 0; i < size; i++)
    {
        curMax += arr[i];
        if(bestMax < curMax) bestMax = curMax;
        if(arr[i] < 0) curMax = 0;
    }
    return bestMax;
}
int main()
{
    int n;
    cin >> n;
    int arr[n];
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }
    cout << kadanes_algo(arr,n) << endl;
}

// 10
// -5 -2 1 2 3 -5 6 10 -3 8