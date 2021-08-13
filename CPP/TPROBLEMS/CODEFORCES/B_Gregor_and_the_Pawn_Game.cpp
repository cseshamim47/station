//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
// ll cnt;

void solve(){
    int cnt = 0;
    int n;
    cin >> n;
    char enemy[n+5],ami[n+5];
    for(int i = 0; i < n; i++) cin >> enemy[i];
    for(int i = 0; i < n; i++) cin >> ami[i];

    for(int i = 0; i < n; i++){
        if(ami[i] == '0') continue;
        else if(enemy[i] == '0') cnt++;
        else if(i-1 >= 0 && enemy[i-1] == '1'){
            cnt++;
            enemy[i-1] = '9';
        }else if(i+1 < n && enemy[i+1] == '1'){
            cnt++;
            enemy[i+1] = '9';
        }
    }
    cout << cnt << "\n";
}

int main()
{
      //        Bismillah
    int t;   cin >> t;   w(t);
    

}