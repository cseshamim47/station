//Check Number
#include <bits/stdc++.h>
using namespace std;

bool isFound(int arr[],int i,int& k)
{
    if(arr[i] == k) return true;
    if(i == 0) return false;
    bool found = isFound(arr,--i,k);
    return found;
}

int main()
{
    //    Bismillah
    int n , k;
    cin >> n >> k;
    int arr[n]; 
    for(int i = 0; i < n; i++){
        cin >> arr[i];
    }
    if(isFound(arr,n-1,k)) cout << "True" << endl;
    else cout << "False" << endl;
}