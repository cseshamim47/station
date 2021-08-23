//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){
    int n;
    cin >> n;
    int arr[n];
    for(int i = 1; i <= n; i++){
        arr[i-1] = i;
    }
    if(n%2 == 0){
        for(int i = 0; i < n; i+=2){
            swap(arr[i],arr[i+1]);
        }
    }else{
        for(int i = 0; i < n-1; i+=2){
            swap(arr[i],arr[i+1]);
        }
        swap(arr[n-1],arr[(n-2)]);
    }
    for(auto &i : arr) cout << i << " ";
    cout << "\n";
}
// 1 2 3 - 2 1 3 - 

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    

}