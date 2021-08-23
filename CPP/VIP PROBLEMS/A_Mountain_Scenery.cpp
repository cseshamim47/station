//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define gch getchar();
#define cls system("cls");
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){}

int main()
{
      //        Bismillah
     // ll t;   cin >> t;   w(t);
    // cls

    int n,k;
    cin >> n >> k;
    int size = n*2 + 1;
    int arr[size];
    for(int i = 0; i < size; i++){
        cin >> arr[i];
    }

    if(n == 1){
        arr[1] -= 1;
    }else{
        for(int i = size-1; i>=1; i--){
            if(i & 1){
                int temp = arr[i]-1;
                
                if(arr[i-1] < temp && temp > arr[i+1]){
                    arr[i] -= 1;
                    k--;
                }
            }
            if(k == 0) break; 
        }
    }
    
    for(auto &x : arr) cout << x << " ";
    
}