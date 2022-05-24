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
    string t;
    cin >> t;
    if(s(t) == 5) cout << 3 << endl;
    else
    {
        int one = 0;
        string str = "one";
        for(int i = 0; i < 3; i++)
        {
            if(str[i] == t[i]) one++;
        }
        cout << (one>=2? 1 : 2) << endl;
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