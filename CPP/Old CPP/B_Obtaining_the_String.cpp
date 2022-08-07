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
    n = in;
    string a = in, b = in;
    vector<int> ans;
    map<char,int> mp1;

    fo(i,n) mp1[b[i]]++;
    fo(i,n)
    {
        mp1[a[i]]--;
        if(mp1[a[i]] == 0)
        {
            mp1.erase(a[i]);
        }
    }
   

    if(s(mp1) != 0)
    {
        cout << -1 << endl;
        return;
    }
    for(int i = 0; i < n; i++)
    {
        while(a[i] != b[i])
        {
            for(int j = i; j+1 < n; j++)
            {
                if(a[j+1]==b[i])
                {
                    ans.push_back(j+1);
                    swap(a[j],a[j+1]);
                    if(a[i] == b[i]) break;
                }
            }

        }
    }
    // cout << a << endl;
    cout << ans.size();
    if(ans.size() != 0) cout << endl;
    for(auto x : ans) cout << x << " ";
    printf("\n");
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