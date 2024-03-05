#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    string s1, s2;
    cin >> s1 >> s2;

    int a = 0;
    for(int i = 0; i < (long long)s1.size(); i++)
    {
        a += (s1[i]-'0');
        // a%=3;
    }

    int b = 0;     
    for(int i = 0; i < (long long)s2.size(); i++)
    {
        b += (s2[i]-'0');
        // b%=3;
    }

    int ans = (a*b)%3;
    cout << ans << endl;
}

int32_t main()
{
      //        Bismillah
    BOOST
    w(t)
}