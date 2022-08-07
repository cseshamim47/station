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

void fileInput()
{
    #ifndef ONLINE_JUDGE
        freopen("input.txt", "r", stdin);
        freopen("output.txt", "w", stdout);
    #endif
}

void f()
{}

int Case;
void solve()
{
    int n;
    cin >> n;
    string str;
    cin >> str;
    int a = -1;
    
    vector<pair<int,int>> ans;
    char ch = '1';
    
    for(int i = 0; i < n; i++)
    {
        if(str[i] == ch)
        {
            ans.push_back({i+1,n-i});
            if(ch == '1') ch = '0';
            else ch = '1';
        }
    }
    
    cout << ans.size() << endl;
    for(auto x : ans)
    {
        cout << x.first << " " << x.second << endl;
    }
    
}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    w(t)
    // solve();
    // f();
}