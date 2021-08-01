//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){
    int n,k;
    cin >> n >> k;
    int arr[n];
    for(int i = 0; i < n; i++){
        cin >> arr[i];
    }
    int R = n-1;
    int L = 0;
    while(k--){
        if(arr[L]-1 > -1){
            arr[L]--;
            arr[R]++;
        }else{
            L++;
            k++;
        } 
        if(L == n) break;
    }
    for(auto &i : arr) cout << i << " ";
    cout << "\n";

}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    

}