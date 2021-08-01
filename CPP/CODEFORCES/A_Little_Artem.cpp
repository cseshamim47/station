//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){
    int cnt = 0;
    int r,c;
    cin >> r >> c;
    int tot = r*c;
    if(tot & 1){
        for(int i = 0; i < r*c; i++){
            if(i & 1) cout << "W";
            else cout << "B";
            cnt++;
            if(cnt == c){
                cout << "\n";
                cnt = 0;
            }
        }
    }else{
        cout << "B";
        for(int i = 0; i < c-1; i++){
            if(i & 1) cout << "W";
            else cout << "B";
        }
        cout << "\n";
        r--;
        for(int i = 0; i < r*c; i++){
            if(i & 1) cout << "W";
            else cout << "B";
            cnt++;
            if(cnt == c){
                cout << "\n";
                cnt = 0;
            }
        }
    }

}


int main()
{
      //        Bismillah
    int t;   cin >> t;   w(t);
    // solve();

}

// BBWBWB
// BWBWBW
// BWBWBW
// BWBWBW