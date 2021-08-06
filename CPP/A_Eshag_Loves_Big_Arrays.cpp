//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){
    int size;
    cin >> size;
    int arr[size];
    for(int i = 0; i < size; i++){
        cin >> arr[i];
    }
    sort(arr,arr+size);
    int cantDelete = arr[0];
    cnt = 1;
    for(int i = 1; i < size; i++){
        if(arr[i] == cantDelete) cnt++;
        else break;
    }
    cout << size - cnt << endl;

    cnt = 0;
    // for(auto &i : arr) cout << i << " ";
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    

}