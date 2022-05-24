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

void f()
{}

int Case;
void solve()
{
    int i,j,m,n;
    cin >> n;
    string str;
    cin >> str;
    cin >> m;
    int mp[27]{0};

    fo(i,m)
    {
        char c;
        cin >> c;
        mp[c-'a']++;
    }
    int ans = 0;
   
    int prev = 0;
    int cur = 0;
    for(int i = 0; i < n; i++)
    {
        
        // if(mp[str[i]]) v.push_back(i);
        if(prev == 0 && mp[str[i]-'a']) 
        {
            prev = i;
            ans = prev;
        }else if(mp[str[i]-'a'])
        {
            cur = i;
            // ans = max(ans,cur-prev);
            if(ans < cur-prev) 
            {
                ans = cur-prev;
            }
            prev = i;
        }
    }

    // if(s(v) > 0)
    // ans = v[0];

    // for(int i = 0; i+1 < s(v); i++)
    // {
    //     ans = max(ans,v[i+1]-v[i]); 
    // }

    cout << ans << endl;
}

int32_t main()
{
      //        Bismillah
    // fileInput();
    BOOST
    w(t)
    // solve();
    // f();
}