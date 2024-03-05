#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    if(n >= 0 && n < 40){
        cout << 40 - n << endl;
    }else if(n >= 40 && n < 70){
        cout << 70-n << endl;
    }else if(n >= 70 && n < 90){
        cout << 90-n << endl;
    }else if(n >= 90){
        cout << "expert" << endl;
    }
}

int32_t main()
{
      //        Bismillah
    // w(t)
    solve();
}