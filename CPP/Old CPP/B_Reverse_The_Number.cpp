#include <iostream>

using namespace std;

int main()
{
    int x;
    cin >> x;
    int arr[x];
    int n;
    for(int i = 0; i<x; i++){
    cin >> n;
    int reverse = 0, remainder;
    while(n!=0){
        remainder = n%10;
        reverse = reverse*10 + remainder;
        n /= 10;
    }
    arr[i] = reverse;
    }
    for(int i = 0; i<x; i++){
        cout << arr[i] << endl;
    }
}