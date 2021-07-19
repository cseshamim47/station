//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){
    int n,k;
    cin >> n >> k;
    string s;
    cin >> s;

    if(k == 0) cout << "YES" << "\n";
    else if(s[0] != s[n-1] && k != 0) cout << "NO" << "\n";
    else{
        for(int i = 0; i < n; i++){
            if(s[i] == s[n-1-i]) cnt++;
            else break;
        }

        if(cnt >= k && k*2 != n) cout << "YES" << "\n";
        else cout << "NO" << "\n";
    }
    cnt = 0;
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    

}