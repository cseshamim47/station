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
    int t = 2;
    string str;
    int cnt = 0;
    while(getline(cin,str))
    {
        
        for(int i = 0; i < s(str); i++)
        {
            if(str[i] == '"')
            {
                if(cnt % 2 == 0)
                {
                    cout << "``";
                    cnt++;
                }else
                {
                    cout << "''";
                    cnt++;
                }
                continue;
            }
            cout << str[i];
        }
        cout << endl;

    }
}


int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
    //f();
}