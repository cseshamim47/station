#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    string s1,s2;
    cin >> s1 >> s2;
    int a = s1.size();
    int b = s2.size();
    if(s1.size() > s2.size()) swap(s1,s2);
    int lcm = (a*b)/__gcd(a,b);
    string ans = "";
    for(int i = 0; i < (lcm/s1.size()); i++)
    {
        ans+=s1;
    }
    int f = ans.find(s1);
    int cnt = 0;
    while(f != string::npos)
    {
        cnt++;
        f = ans.find(s1,f+s1.size());
    }
    if(cnt == (lcm/s1.size()))
    {
        f = ans.find(s2);
        cnt = 0;
        while(f != string::npos)
        {
            cnt++;
            f = ans.find(s2,f+s2.size());
        }
        if(cnt == (lcm/s2.size()))
        {
            cout << ans << endl;
            return;
        }
    }
    cout << -1 << endl;
    
   
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}