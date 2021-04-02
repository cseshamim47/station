#include <iostream>
using namespace std;

int countDistinct(int arr[], int n){
    bool isPrime = true;
    int count = 0;
    for(int i = 0; i < n; i++){
        isPrime = true;
        for(int j = i - 1; j >= 0; j--){
            if(arr[i]==arr[j]) {
                isPrime = false;
                break;
            }
        }
        if(isPrime) count++;
    }
    return count;

}

int main()
{
    int n;
    cin >> n;
    int arr[n];

    for(int i = 0; i < n; i++) cin >> arr[i];

    cout << "Distinct Element : " << countDistinct(arr, n);
}