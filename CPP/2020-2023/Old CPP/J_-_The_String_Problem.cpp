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
    int n,m;
    cin >> n >> m;

    string s1, s2;
    cin >> s1 >> s2;

    map<char,int> mp;
    for(int i = 0; i < n; i++)
    {
        mp[s1[i]]++;
    }

    map<char,int> mp2;
    for(int i = 0; i < m; i++)
    {
        mp2[s2[i]]++;
    }
    
    int mn = INT_MAX;
    for(int i = 0; i < m; i++)
    {
        mn = min(mn,mp[s2[i]]/mp2[s2[i]]);
    }
    cout << mn << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
    //f();
}