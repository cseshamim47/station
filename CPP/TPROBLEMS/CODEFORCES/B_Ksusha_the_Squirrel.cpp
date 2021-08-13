//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }


void solve(){
    int n, k;
    cin >> n >> k;
    string str; 
    cin >> str;
    int i,cnt = 0;
    for(i = 0; i < n; i++)
    {
        if(str[i] == '.' && cnt < k){
            cnt = 0;
            continue;
        } 
        cnt++;   
    }
    i--;
    // cout << i << endl;
    if(!cnt) cout << "YES" << "\n";
    else cout << "NO" << "\n";
}

int main()
{
      //        Bismillah
    // int t;   cin >> t;   w(t);
    solve();
    

}