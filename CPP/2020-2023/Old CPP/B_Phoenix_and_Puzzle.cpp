#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

bool isPerfectSquare(double n)
{
    if(n<2) return false;
    double x = sqrt(n);
    int y = (int)x;
    if(y==x) return true;
    else return false;
}

void solve()
{
    int n;
    cin >> n;
    if(n&1) cout << "NO" << endl;
    else if(n==2 || n == 4 || isPerfectSquare(n/2.00) || isPerfectSquare(n/4.00))  cout << "YES" << endl;
    else cout << "NO" << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}