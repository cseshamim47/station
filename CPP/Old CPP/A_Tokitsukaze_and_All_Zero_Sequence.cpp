#include <bits/stdc++.h>
using namespace std;

#define fo(i,n) for(i=0;i<n;i++)
#define vi vector<int>
#define pb push_back
#define pf push_front
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
    vi v(n);
    fo(i,n) v[i] = in;
    bool ok = true;
    sort(all(v));
    int cnt = 0;

    for(int i = 0; i+1 < n; i++) 
    {
        if(v[i] == 0) 
        {
            ok = false;
            break;
        }
        if(v[i] == v[i+1])
        {
            v[i] = 0;
            cnt = 1;
            break;
        }
    }
    // sort(all(v));
    if(!cnt && ok)
    {
        cnt = 2;
        v[0] = 0;

    }
    // while(ok)
    // {
    //     ok = false;

        for(int i = 0; i < n; i++)
        {
            // cout << v[i] << " ";
            if(v[i] == 0) continue;
            
            
            // int x = min(v[i],v[i+1]);
            // v[i] = x;
            // v[i+1] = x;
            cnt++;
            // ok = true;
            // break;
        }
    // }
    cout << cnt << endl;
    // printf("\n");
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