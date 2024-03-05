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

void solve()
{
    int r,g,b,w;
    cin >> r >> g >> b >> w;

    int val = min({r,g,b});
    
    int cnt = 0;
    if(r % 2 == 1) cnt++;
    if(g % 2 == 1) cnt++;
    if(b % 2 == 1) cnt++;
    if(w % 2 == 1) cnt++;

    if(cnt <= 1)
    {
        cout << "Yes" << endl;
        return;
    }

    if(val != 0)
    {
        r--;
        g--;
        b--;
        w+=3;
        cnt = 0;
        if(r % 2 == 1) cnt++;
        if(g % 2 == 1) cnt++;
        if(b % 2 == 1) cnt++;
        if(w % 2 == 1) cnt++;

        if(cnt <= 1) cout << "Yes" << endl;
        else cout << "No" << endl;
    }else
    {
        cout << "No" << endl;
    }
    



}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
    //bruteforce();
}