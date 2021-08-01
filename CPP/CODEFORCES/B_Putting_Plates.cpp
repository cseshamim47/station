//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){
    int r,c;
    cin >> r >> c;
    int arr[r+2][c+2];

    for(int i = 0; i < r; i++){
        for(int j = 0; j < c; j++) arr[i][j] = 0;
    }

    for(int i = 0; i < c; i+=2) arr[0][i] = 1;

    for(int i = 2; i < r; i+=2){
        arr[i][0] = 1;
        arr[i][c-1] = 1;
    }
    
    for(int i = 2; i < c-2; i+=2){
        arr[r-1][i] = 1;
    }

    for(int i = 0; i < r; i++){
        for(int j = 0; j < c; j++) cout << arr[i][j];
    cout << "\n";
    }

    cout << "\n";


}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    

}