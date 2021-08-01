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
    int arr[n][5];

    for(int i = 0; i < n; i++){
        for(int j = 0; j < 5; j++){
            cin >> arr[i][j];
        }
    }

    int smallIdx = 0;
    for(int i = 1; i < n; i++){
        int sum = 0;
        for(int j = 0; j < 5; j++){
            if(arr[smallIdx][j] > arr[i][j])
                sum++;
        }
        if(sum >= 3) smallIdx = i;
    }

    for(int i = 0; i < n; i++){
        int sum = 0;
        if(smallIdx != i)
            for(int j = 0; j < 5; j++){
                if(arr[smallIdx][j] > arr[i][j])
                    sum++;
            }
        if(sum >= 3){
            cout << -1 << "\n";
            return;
        }
    }

    
    cout << smallIdx+1 << endl;

}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);

}

/**
 
1
50000 1 50000 50000 50000



3
a = 10 10 20 30 30
b = 20 20 30 10 10
c = 30 30 10 20 20

a = 1 2 
b = 4 5
c = 3 

ans = -1 



3
1 1 1 1 1
2 2 2 2 2
3 3 3 3 3

a = 1 2 3 4 5
b c 0

6
a = 9 5 3 7 1
b = 7 4 1 6 8
c = 5 6 7 3 2
d = 6 7 8 8 6
e = 4 2 2 4 5
f = 8 3 6 9 4


a = 5
b = 3 
c = 4
d = 0
e = 1 2 
f = 0  


  


**/