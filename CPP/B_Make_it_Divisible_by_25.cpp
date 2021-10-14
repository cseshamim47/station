#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    string str;
    cin >> str;
    // 00 25 50 75
    int zz = 100,tf = 100, fz = 100,sf = 100;
    int t = 100, f = 100, z = 100, s = 100;
    int sz = (int)str.size();
    for(int i = 0; i < sz; i++)
    {
        if(i != sz-1 && str[i] == '0' && str[i+1] == '0')
        {
            zz = (int)str.size()-i-2;
        }
        
        if(str[i] == '2' || str[i] == '5')
        {
            // if(str[i] == '2' && )
        }

    }

    for(int i = 0; i < sz; i++)
    {
        if(str[i] == '5' || str[i] == '0')
        {
            if(str[i] == '5' && z == 100)
            {
                f = i;
            }else if(str[i] == '0' && f != 100)
            {
                z = i;
            }
        }
    }
    // 50555
    fz = f + (z-f-1) + (sz-z-1);
    // cout << f << " " << z << endl;
    cout << fz << " " << zz << endl;
    // cout << zz << ' ' << z << " " << t << " " << f << " " << s << endl;
    //  255555
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}