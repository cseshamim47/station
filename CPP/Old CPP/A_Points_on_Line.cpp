//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){}

int main()
{
      //        Bismillah
    //  int t;   cin >> t;   w(t);

    int size,k;
    cin >> size >> k;
    int arr[size];
    for(int i = 0; i < size; i++){
        cin >> arr[i];
    }

    for(int i = 0; i < size; i++){
        ll right = arr[i] + k;
        int lb = lower_bound(arr,arr+size,right) - arr;

        if(lb == size || right != arr[lb]) lb--;

        ll p = lb-i;
        cnt +=  p*(p-1)/2;

        // cout << lb << " " << cnt << endl;
    }
    cout << cnt << endl;

    cnt = 0;

    // for(auto &i : arr) cout << i << " ";
    

}