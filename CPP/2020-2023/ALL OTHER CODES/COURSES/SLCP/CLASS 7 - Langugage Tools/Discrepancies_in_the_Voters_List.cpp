#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int a,b,c;
    cin >> a >> b >> c;
    set<int> s;
    int t = a+b+c;
    set<int> ans;
    while(t--)
    {
        cin >> a;
        
        if(s.find(a) != s.end())
        {
            ans.insert(a);
            // cout << " -- " << a << endl;
        }else s.insert(a);
    }
    cout << ans.size() << endl;
    for(auto it = ans.begin(); it != ans.end(); it++)
        cout << *it << endl;
}

int32_t main()
{
      //        Bismillah
    // w(t)
    solve();
    
}