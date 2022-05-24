#include <bits/stdc++.h>
using namespace std;

#define fo(i,n) for(i=0;i<n;i++)
#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

struct{
    template<class T> operator T() {
        T x;
        cin >> x;
        return x;
    }
}in;

void fileInput()
{
    #ifndef ONLINE_JUDGE
        freopen("input.txt", "r", stdin);
        freopen("output.txt", "w", stdout);
    #endif
}

int gcd(int a, int b)
{
    if(!b) return a;
    return gcd(b,a%b);
}

void f()
{}

int Case;
void solve()
{
    int i,j,m,n;
    int cash = in;
    n = in;
    vector<char> v(n,0);
    map<char,int> mp;
    fo(i, n) 
    {
        v[i] = in;
        mp[v[i]] = 1;
    }

    string str;
    bool okay = true;
    while(okay)
    {
        str = to_string(cash);
        int x = 0;
        for(int i = 0; i < s(str); i++)
        {
            if(mp[str[i]] == 1) x++;
        }
        if(x == 0) okay = false;
        else cash++;
    }
    cout << cash << endl;

}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    // w(t)
    solve();
    // f();
}