//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }


void solve(){
    int n;
    cin >> n;
    int arr[n+5];
    for(int i = 0; i < n; i++){
        cin >> arr[i];
    }
    int cnt = 0;
    int ans[n+5]={0};
    for(int i = n-1; i>=0; i--){
        if(arr[i] > cnt){
            cnt = arr[i];
        }
        if(cnt){
             ans[i] = 1;
             cnt--;
        }
    }

    for(int i = 0; i < n; i++) cout << ans[i] << " ";
    cout << "\n";
}

int main()
{
      //        Bismillah
    int t;   cin >> t;   w(t);
    

}