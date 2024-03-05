#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int a,b,p,r;
    cin >> a >> b >> p >> r;
    if(a>b) swap(a,b);
    int dist = abs(a-b);
    int left = p-r;
    int right = p+r;

    if(a==b || (left <= a && right >= b)) cout << 0 << endl;
    else if(right<=a || left>=b) cout << b-a << endl;
    else if(left>=a && right<=b) cout << left-a+b-right << endl;
    else if(left < a && right < b) cout << b-right << endl;
    else if(left>a && right > b) cout << left-a << endl;

}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}