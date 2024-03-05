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
    string str;
    cin >> str;
    map<char,int> mp;
    bool ok = true;
    mp[str[0]]++;
    for(int i = 1; i < s(str); i++)
    {
        mp[str[i]]++;
    }

    // if(!ok && mp.size() > 1) cout << "NO" << endl;
    // else cout << "YES" << endl;

    int cnt = 0;
    map<char,int> nmp;
    j = 0;
    for(int i = 0; i < s(str); i++)
    {
        nmp[str[i]]++;
        cnt++;
        // deb(cnt);
        // for(auto x : nmp)
        // {
        //     cout << x.first <<  x.second;
        // }
        // cout << endl;
        if(cnt == mp.size())
        {
            if(nmp.size() != mp.size())
            {
                cout << "NO" << endl;
                return;
            }
            nmp[str[j]]--;
            if(nmp[str[j]] == 0)
            nmp.erase(str[j]);

            cnt--;
            j++;
        }
        
    }
    cout << "YES" << endl;

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