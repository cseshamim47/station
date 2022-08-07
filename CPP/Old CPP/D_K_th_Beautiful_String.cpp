//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define gch getchar();
#define cls system("cls");
#define w(t) while(t--){ solve(); }
int cnt;

void solve(){
    int n,k,m;
    cin >> n >> k;
    string ans(n,'a');
    for(int i = n-2; i>=0; i--){
        m = n - i - 1;
        if(k<=m){
            ans[i] = 'b';
            ans[n-k] = 'b';
            break;
        }
        k -= m;
    }
    cout << ans << "\n";

}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    // cls

}