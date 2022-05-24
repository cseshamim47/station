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

void f()
{}

int Case;
void solve()
{
    int n;
    cin >> n;
    string str;
    cin >> str;
    int cnt = 0;
    int z = 0;
    int o = 0;
    for(int i = 0; i < n; i++)
    {
        if(str[i] == '0') z++;
        else o++;
        if(z == 0) o = 0;

        if(z == 2)
        {
            if(o < 2)
            {
                cnt += 2-o;
            } 
            o = 0;
            z = 1;
        }
    }
    cout << cnt << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
    //f();
}