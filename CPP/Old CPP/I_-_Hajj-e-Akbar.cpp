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
    string str;
    while(cin >> str)
    {
        if(str == "*") break;
        
        if(str == "Hajj")
        {
            printf("Case %d: Hajj-e-Akbar\n",++Case);
        }else
        {
            printf("Case %d: Hajj-e-Asghar\n",++Case);
        }
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
    //bruteforce();
}