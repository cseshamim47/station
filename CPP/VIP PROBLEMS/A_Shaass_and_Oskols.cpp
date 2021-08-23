#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n;
    cin >> n;
    n = n+1;
    int arr[n+1] = {0};
    
    for(int i = 1; i < n; i++){
        cin >> arr[i];
        // cout << arr[i] << " ";
    }
    // 0
    // 12
    // 0
    // 12
    // 10

    int row, bird,s;
    cin >> s;
    for(int i = 1; i < s+1; i++){
        cin >> row >> bird;
        // if(row-1 >= 1) 
        arr[row-1] += bird - 1;
        // if(row+1 < n) 
        arr[row+1] += arr[row] - bird;
        arr[row] = 0;
        // cout << arr[row-1] << endl << arr[row] << endl << arr[row+1] << endl;
    }

    for(int i = 1; i < n; i++){
        cout << arr[i] << endl;
    }

    
}