#include <bits/stdc++.h>
using namespace std;

#define fo(i,n) for(i=0;i<n;i++)
#define deb(x) cout << #x << "=" << x << endl
#define deb2(x, y) cout << #x << "=" << x << "," << #y << "=" << y << endl
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

vector<string> str;
void f()
{
    char f = 'a';
    int i = 26;
    while(i--)
    {
        for(char x = 'a'; x <= 'z'; x++)
        {
            string tmp;
            if(x == f) continue;
            tmp.push_back(f);
            tmp.push_back(x);
            str.push_back(tmp);
            tmp.pop_back();
        }
        f++;
    }

    // for(auto x : str) cout << x << endl;
}

int Case;
void solve()
{
    int i,j,m,n;
    string s;
    cin >> s;
    for(int i = 0; i < s(str); i++)
    {
        if(s == str[i]) 
        {
            cout << i+1 << endl;
            break;
        }
    }
}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    f();
    w(t)
    // solve();
}