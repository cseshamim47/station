#include <bits/stdc++.h>
using namespace std;

void solve(){
    int n;
    cin >> n;
    int arr[n+1];
    bool f = 1;
    for(int i = 1; i<=n; i++){
        cin >> arr[i];
        if(arr[i] != i) f = 0;
    }
    if(f) cout << 0;
    else if(arr[1]==1 or arr[n]==n) cout << 1;
    else if(arr[1]=n or ar)
}

int main()
{
    int T;
    cin >> T;
    while(T--){
        solve();
    }
    
}