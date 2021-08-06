#include <iostream>
using namespace std;
void distinctElement(int arr[], int n);
int main()
{
    int n;
    cin >> n;
    int arr[n];

    for(int i = 0; i < n; i++){
        cin >> arr[i];
    }
    distinctElement(arr, n);
}

void distinctElement(int arr[], int n){
    int distint=1;
    
    for(int i = 1; i < n; i++){
        int count = 0;
        for(int j = i-1; j >= 0; j--){
            if(arr[j]==arr[i]) count++;
        }
        // cout << count << " ";
        if(count==0) distint++;
    }
    cout << distint << endl;
}