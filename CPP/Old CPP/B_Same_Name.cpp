#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    map<string,string> mp;
    bool pa = false;
    for(int i = 0; i < n; i++)
    {
        string a,b;
        cin >> a >> b;
        if(mp[a] == b)
        {
            pa = true;
        }
        else mp[a] = b;
    }
    if(pa) cout << "Yes" << endl;
    else cout << "No" << endl;
}

int main()
{
      //        Bismillah
    // w(t)
    solve();
}