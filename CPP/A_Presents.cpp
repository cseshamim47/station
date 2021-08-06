#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n;
    cin >> n;
    n++;
    int arr[n],ans[n];

    for(int i = 1; i < n; i++){
        cin >> arr[i];
        ans[arr[i]] = i;
    }
    for(int i = 1; i < n; i++){
        cout << ans[i] << " ";
    }
    
}