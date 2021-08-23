#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n;
    cin >> n;
    int arr[n];

    for(int i = 0; i < n; i++){
        cin >> arr[i];
    }

    for(int i = 0; i < n; i++){
        int maxx = 0, minn = 0;
        if(i == 0){
           cout << abs(arr[i]-arr[i+1]) << " " << abs(arr[n-1]-arr[i]) << "\n";
        }
        if(i == n-1){
           cout << abs(arr[i]-arr[i-1]) << " " << abs(arr[i]-arr[0]) << "\n";
        }
        if(i != 0 && i != n-1){
           cout << min(abs(arr[i]-arr[i-1]),abs(arr[i]-arr[i+1])) << " " << max(abs(arr[i]-arr[0]),abs(arr[i]-arr[n-1])) << "\n";
        }
    }

    
}