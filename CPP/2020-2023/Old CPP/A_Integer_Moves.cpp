#include <bits/stdc++.h>
using namespace std;

#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

void bruteforce()
{}

double dist(int x,int y)
{
    return sqrt(sq(0-x)+sq(0-y));
}

int Case;
void solve()
{
    double x,y;
    cin >> x >> y;
    // cout << dist(x,y) << endl;
    if(dist(x,y) == 0) cout << 0 << endl;
    else if(dist(x,y) == (int)dist(x,y)) cout << 1 << endl;
    else cout << 2 << endl;

}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
    //bruteforce();
}