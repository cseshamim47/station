//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){
    ll n;
    cin >> n;
    vector<ll> arr;
    arr.push_back(0);
    for(ll i = 0; i < n; i++){
        int x;
        cin >> x; 
        arr.push_back(x);
    }
    arr.push_back(0);

    for(int i = 1; i<=n; i++){
        if(arr[i-1] < arr[i] && arr[i] > arr[i+1]){
            ll tmp = max(arr[i-1],arr[i+1]);
            cnt += arr[i] - tmp;
            arr[i] = tmp;
        }
    }
    
    for(ll i = 1; i < arr.size(); i++){
        cnt += abs(arr[i]-arr[i-1]);
    }

    cout << cnt << endl;

    cnt = 0;


}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    

}