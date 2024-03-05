#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n,a,b,c,d;
    cin >> n >> a >> b >> c >> d;
    int eachLow = (a-b);
    int eachMax = (a+b);
    int wholeLow = (c-d);
    int wholeMax = (c+d);
    if(eachLow*n > wholeMax || eachMax*n < wholeLow) cout << "No" << endl;
    else cout << "Yes" << endl; 
        
}

// 1-3
// 2 2

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}