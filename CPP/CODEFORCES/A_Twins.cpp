#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n;
    cin >> n;
    int arr[n];
    for(int i = 0; i<n; i++){
        cin >> arr[i];
    }
    sort(arr,arr+n,greater<int>());
    // for(auto x : arr) cout << x << " ";
      cout << endl;
      int sum = 0;
      int i;
    for(i = 1; i < n; i++){
        sum += arr[i-1];
        if(sum > accumulate(arr+i,arr+n,0)) break;
        // cout << sum << " " << accumulate(arr+i,arr+n,0) << endl;
    }
    cout << i << endl;
}