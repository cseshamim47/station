#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define eps 1e-6
#define MAX 1000006
#define PI acos(0.0)*2

int Case;
void solve()
{
    double n;
    cin >> n;
    cout << "Case " << ++Case << ": ";
    double circle = PI*n*n;
    n += n;
    double sq = n*n;
    cout << setprecision(2) << fixed << (sq - circle) + eps << endl; 
}

int main()
{
      //        Bismillah
    w(t)
}