#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    string x1,x2;
    int a,b;
    cin >> x1 >> a >> x2 >> b;

    int sizeX1 = x1.size()+a;
    int sizeX2 = x2.size()+b;

    if(sizeX1 < sizeX2) cout << "<" << endl;
    else if(sizeX1 > sizeX2) cout << ">" << endl;   
    else
    {
        while(x1.size() < x2.size())
        {
            x1 += "0";
        }

        while(x1.size() > x2.size())
        {
            x2 += "0";
        }

        cout << x1 << " " << x2 << endl;
        if(x1 > x2)
        {
            cout << ">" << endl;
        }else if(x1 < x2)
        {
            cout << "<" << endl;
        }else
        {
            cout << "=" << endl;
        }
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}