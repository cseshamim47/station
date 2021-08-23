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
    int max = -1;
    cin >> arr[0];
    cnt += arr[0];
    bool isDiff = false;
    for(int i = 1; i < size; i++){
        cin >> arr[i];
        cnt += arr[i];
        if(arr[i-1] != arr[i]) isDiff = true;
        // if(arr[i] > max) max = arr[i];
    }

    if(size <= 1) cout << 0 << endl;
    else if(cnt%size == 0){
        int ans = 0;
        for(int i = 0; i < size; i++){
            if(arr[i] > cnt/size){
                ans++;
            }
        }
        cout << ans << endl;

    }else cout << -1 << endl;

    cnt = 0;
    // for(auto &i : arr) cout << i << " ";
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);

}


// 4
// 5 2 5
// 5%4 = 1
// 5%4 = 1
// 5%2 = 1



