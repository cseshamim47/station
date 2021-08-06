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
    int ans = 0,sum=0,i = 1;

    // while (sum < n)
    // {
    //     sum += i;
    //     i += 2;
    //     cout << sum << " " << i << endl;
    //     ans++; 
    // }
    
    for(int i = 1; i <= n; i++){
        // cout << i*i << endl;
        if(i*i >= n){
            ans = i;
            break;
        }
    }
    
    cout << ans << endl;
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    

}