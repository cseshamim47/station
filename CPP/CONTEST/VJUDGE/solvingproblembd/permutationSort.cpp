#include <bits/stdc++.h>
using namespace std;

int main()
{
    int T,t;
    int temp,count = 0;
    cin >> T;
    bool isSorted = 1;
    while(T--){
        cin >> t;
        int arr[t+1];
        for(int i = 1; i <= t; i++){
            cin >> arr[i];
            if(arr[i] != i) isSorted = 0;
        }
        
        if(isSorted) cout << 0 << endl;
        else if(arr[1]==1 || arr[t]==t) cout << 1 << endl;
        else if(arr[t] == 1 && arr[1] == t) cout << 3 << endl;
        else cout << 2 << endl;
        isSorted = 1;
    }
    

    
    
}