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

int Case;
void solve()
{
    int l,w,h;
    cin >> l >> w >> h;
    if(l <= 20 && w <= 20 && h <= 20)
    {
        printf("Case %d: good\n",++Case);
    }else
        printf("Case %d: bad\n",++Case);
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
    //bruteforce();
}