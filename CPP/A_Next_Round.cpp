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
    k--;
    int arr[n];

    for(int i = 0; i < n; i++){
        cin >> arr[i];
    }
    k = arr[k];
    for(int i = 0; i < n; i++){
        if(arr[i] >= k && arr[i] > 0) cnt++;
    }
    cout << cnt << endl;
    cnt = 0;
}

int main()
{
     
    solve();
    
}
    