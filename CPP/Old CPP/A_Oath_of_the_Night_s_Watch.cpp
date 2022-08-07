#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n;
    cin >> n;
    int arr[n];
    int x,count=0;

    for(int i = 0; i < n; i++){
        cin >> arr[i];   
    }
    int minn = *min_element(arr,arr+n);
    int maxx = *max_element(arr,arr+n);
    count = 0;
    if(n<=2) count = 0;
    else{
        for(int i = 0; i < n; i++){
            if(arr[i] > minn && arr[i] < maxx) count++;
        }
    }

    cout << count << endl;
    
}