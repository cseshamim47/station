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

int gcd(int a, int b)
{
    if(!b) return a;
    return gcd(b,a%b);
}

bool f(string a,string b)
{
    if(s(a) == s(b))
    {
        return a < b;
    }
    return a.size() < b.size();

}

int Case;
void solve()
{
    int n;
    cin >> n;
    vector<string> str;
    str.resize(n,"");
    for(int i = 0; i < n; i++)
    {
        cin >> str[i];
        // sort(all(str[i]));
    }
    sort(all(str),f);

   
    for(int i = 0; i+1 < n; i++)
    {   
        if(str[i+1].find(str[i]) == string::npos) 
        {
            cout << "NO" << endl;
            return;
        }
    }
    cout << "YES" << endl;
    for(string s : str) cout << s << endl;
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